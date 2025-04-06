<script setup>

import { Link, router } from "@inertiajs/vue3";
import PaginationLinks from "./Components/PaginationLinks.vue";
import { ref, watch } from "vue";
import { throttle } from "lodash";
import { debounce } from "lodash";

const props = defineProps({
    users: Object,
    searchTerm: String,
    can: Object,
});

const search = ref(props.searchTerm);

// This adds a route when you type search
// watch(search, (q) => router.get('/', { search: q}, { preserveState: true }));

// Lodash (delays the search by 1/2 sec)
watch(search, debounce(
    (q) => router.get('/', { search: q}, { preserveState: true }), 500)
);

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>

<template>
    <Head :title="$page.component" />

    <div class="mt-5">
        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input type="search" placeholder="Search" v-model="search">
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="my-5">
            <table>
                <thead>
                    <tr class="bg-slate-300">
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registration Date</th>
                        <th v-if="can.delete_user">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                        <td>
                            <img
                                class="avatar"
                                :src="
                                    user.avatar
                                        ? 'storage/' +
                                          $page.props.auth.user.avatar
                                        : 'https://placehold.co/600x400/png'
                                "
                                alt=""
                            />
                        </td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ getDate(user.created_at) }}</td>
                        <td v-if="can.delete_user">
                            <button class="bg-red-500 w-6 h-6 rounded-full"></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="">

                <PaginationLinks :paginator="users" />

                <!-- <Link
                    v-for="link in users.links"
                    :key="link.label"
                    v-html="link.label"
                    :href="link.url"
                    class="p-1 mx-1"
                    :class="{'text-slate-300' : !link.url, 'text-blue-500 font-medium' : link.active}"
                >
                </Link> -->

                <!-- <p class="text-skate-600 text-sm ml-2">
                    Showing {{ users.from }} to {{ users.to }} of ... results
                </p> -->
            </div>
        </div>
    </div>

    <!-- 
    <Link class="mt-[1000px] block" href="/" preserve-scroll>Refresh</Link> -->
</template>
