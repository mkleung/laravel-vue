<script setup>
import { Link } from "@inertiajs/vue3";
import PaginationLinks from "./Components/PaginationLinks.vue";

defineProps({
    users: Object,
});

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>

<template>
    <Head :title="$page.component" />
    <div class="flex justify-center">
        <div class="my-5">
            <table>
                <thead>
                    <tr class="bg-slate-300">
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registration Date</th>
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
