<script setup></script>

<template>
    <Head>
        <meta head-key="description" name="description" content="description" />
    </Head>
    <div>
        <header class="bg-indigo-500 text-white">
            <nav
                class="flex items-center justify-between p-4 max-w-screen-lg mx-auto"
            >
                <h1 class="text-3xl font-bold">
                    Hello {{ $page.props.auth.user }}
                </h1>
                <div class="space-x-4">
                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>
                </div>
            </nav>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>
