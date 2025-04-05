<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

// setups the form state
const form = useForm({
    name: null,
    email: null,
    password: null,
    avatar: null,
    preview: null,
});

// upload file
const change = (e) => {
    form.avatar = e.target.files[0];
    form.preview = URL.createObjectURL(e.target.files[0]);
};

// Submit form
const submit = () => {
    form.post(route("register"));
};
</script>

<template>
    <Head title="Register" />

    <h1 class="title">Register a new account</h1>

    <div class="w-2/4 mx-auto mb-[100px]">
        <form @submit.prevent="submit">
            <!-- <div>
                <label for="avatar">Avatar</label>
                <input
                    type="file"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600"
                    id="avatar"
                    @input="change"
                />

                <p>{{ form.errors.avatar }}</p>
            </div> -->
            <div class="grid place-items-center">
                <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
                    <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                        <span class="bg-white/70 pb-2 text-center">Avatar</span>
                    </label>
                    <input type="file" @input="change" id="avatar" hidden />
                    <img :src="form.preview ?? 'https://placehold.co/600x400/png'" class="object-cover w-28 h-28" alt="" />
                </div>
                <p class="error mt-2">{{  form.errors.avatar }}</p>
            </div>

            <TextInput
                title="name"
                v-model="form.name"
                :message="form.errors.name"
            />

            <TextInput
                title="email"
                v-model="form.email"
                :message="form.errors.email"
            />

            <TextInput
                title="password"
                v-model="form.password"
                :message="form.errors.password"
            />

            <!-- <div class="mb-6">
                <label>Password</label>
                <input type="password" v-model="form.password" />
                <small class="text-red-500 text-xs italic">{{  form.errors.password }}</small>
            </div> -->

            <div>
                <p class="text-slate-600">
                    Already a user?
                    <a :href="route('login')" class="text-link">Login</a>
                </p>

                <button class="primary-btn mt-5">Register</button>
            </div>
        </form>
    </div>
</template>
