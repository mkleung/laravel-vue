<script setup></script>

<template>
    <Head>
        <meta head-key="description" name="description" content="description" />
    </Head>
    <div>
        <header>
            <nav>
                <h1 class="text-3xl font-bold text-white">
                    Hello {{ $page.props.auth.user }}
                </h1>
                <div class="space-x-4">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                    <Link :href="route('about')" class="nav-link">About</Link>
                    <Link :href="route('register')" class="nav-link">Register</Link>
                </div>
            </nav>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>
