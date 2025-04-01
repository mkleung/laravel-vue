<script setup>
import { reactive } from "vue";

const form = reactive({
    name: null,
    email: null,
    password: null,
});

const submit = () => {
    console.log(form);
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
            </div>

            <div class="mb-6">
                <label>Email</label>
                <input type="email" v-model="form.email" />
            </div>

            <div class="mb-6">
                <label>Password</label>
                <input type="password" v-model="form.password" />
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
