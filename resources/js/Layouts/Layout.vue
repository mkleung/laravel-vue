<script setup></script>

<template>
    <Head>
        <meta head-key="description" name="description" content="description" />
    </Head>
    <div>
        <header>
            <nav>
                <div class="flex flex-row gap-5"  v-if="$page.props.auth.user">
                    <h1 class="text-3xl font-bold text-white">
                        Hello {{ $page.props.auth.user.name }}
                    </h1>
                    <img
                        class="avatar"
                        :src=" $page.props.auth.user.avatar ? 'storage/' + $page.props.auth.user.avatar : 'https://placehold.co/600x400/png'"
                        alt=""
                    />
                </div>

                <div class="flex space-x-6">
                    <Link
                        :href="route('home')"
                        class="nav-link"
                        :class="{ 'bg-slate-700': $page.component === 'Home' }"
                        >Home</Link
                    >

                    <Link
                        :href="route('about')"
                        class="nav-link"
                        :class="{
                            'bg-slate-700': $page.component === 'About',
                        }"
                        >About</Link
                    >

                    <div v-if="$page.props.auth.user" class="flex items-center">
                        <Link
                            :href="route('dashboard')"
                            class="nav-link"
                            :class="{
                                'bg-slate-700': $page.component === 'Dashboard',
                            }"
                            >Dashboard</Link
                        >
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            type="button"
                            class="nav-link"
                            >Logout</Link
                        >
                    </div>
                    <div v-else class="flex items-center">
                        <Link
                            :href="route('register')"
                            class="nav-link"
                            :class="{
                                'bg-slate-700':
                                    $page.component === 'Auth/Register',
                            }"
                            >Register</Link
                        >
                        <Link
                            :href="route('login')"
                            class="nav-link"
                            :class="{
                                'bg-slate-700':
                                    $page.component === 'Auth/Login',
                            }"
                            >Login</Link
                        >
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>
