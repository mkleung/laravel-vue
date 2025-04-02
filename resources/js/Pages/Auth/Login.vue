<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const submit = () => {
    form.post(route("login"));
};
</script>

<template>
    <Head title="Login" />

    <h1 class="title">Login to your account</h1>

    <div class="w-2/4 mx-auto mb-[100px]">
        <form @submit.prevent="submit">
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

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                <label for="remember">Remember me</label>
                <input type="checkbox" v-model="form.remember" id="remember" />
                </div>

                <p class="text-slate-600">
                    Need an account?
                    <a :href="route('register')" class="text-link">Register</a>
                </p>
            </div>

            <div>
                <button class="primary-btn mt-5">Login</button>
            </div>
        </form>
    </div>
</template>
