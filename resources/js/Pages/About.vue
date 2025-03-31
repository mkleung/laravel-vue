<script setup>
defineProps({
    user: String,
});

</script>

<template>
    <Layout>
        <div>
            <h1 class="text-3xl font-bold underline">Hello {{ user }}</h1>
        </div>
    </Layout>
</template>
