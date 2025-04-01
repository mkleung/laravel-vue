<script setup>
import { Link } from '@inertiajs/vue3';


</script>

<template>
    <Head :title="$page.component" />
    <!-- <Layout>
        <div>
            <h1 class="text-3xl font-bold underline">Hello world!</h1>
        </div>
    </Layout> -->

    <Link class="mt-[1000px] block" href="/" preserve-scroll>Refresh</Link>
</template>
