<script setup>

import { useForm } from '@inertiajs/vue3'

const form = useForm({
    name: null,
    email: null,
    password: null,
});

const submit = () => {
   form.post(route('register'));
};

</script>

<template>
    <Head title="Register" />

    <h1 class="title">Register a new account</h1>

    <div class="w-2/4 mx-auto mb-[100px]">
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label>Name</label>
                <input type="text" v-model="form.name" />
                <small class="text-red-500 text-xs italic">{{  form.errors.name }}</small>
            </div>

            <div class="mb-6">
                <label>Email</label>
                <input type="text" v-model="form.email" />
                <small class="text-red-500 text-xs italic">{{  form.errors.email }}</small>
            </div>

            <div class="mb-6">
                <label>Password</label>
                <input type="password" v-model="form.password" />
                <small class="text-red-500 text-xs italic">{{  form.errors.password }}</small>
            </div>

            <div>
                <p class="text-slate-600">
                    Already a user? <a href="#" class="text-link">Login</a>
                </p>

                <button class="primary-btn mt-5">Register</button>
            </div>
        </form>
    </div>
</template>
