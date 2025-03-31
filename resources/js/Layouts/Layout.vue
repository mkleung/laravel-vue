<template>
    <div>
        <header class="bg-indigo-500 text-white">
            <nav class="flex items-center justify-between p-4 max-w-screen-lg mx-auto">
                <div>
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                </div>
            </nav>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>