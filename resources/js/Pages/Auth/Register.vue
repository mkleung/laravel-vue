<script setup>

import { useForm } from '@inertiajs/vue3'
import TextInput from '../Components/TextInput.vue';

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

            <TextInput title="name" v-model="form.name" :message="form.errors.name" />

            <TextInput title="email" v-model="form.email" :message="form.errors.email" />

            <TextInput title="password" v-model="form.password" :message="form.errors.password" />

            <!-- <div class="mb-6">
                <label>Password</label>
                <input type="password" v-model="form.password" />
                <small class="text-red-500 text-xs italic">{{  form.errors.password }}</small>
            </div> -->

            <div>
                <p class="text-slate-600">
                    Already a user? <a :href="route('login')" class="text-link">Login</a>
                </p>

                <button class="primary-btn mt-5">Register</button>
            </div>
        </form>
    </div>
</template>
