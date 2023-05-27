<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="fixed inset-x-0 top-0 h-[5.25rem] bg-yellow-400"></div>
    <nav
        class="fixed flex items-center justify-center sm:justify-between px-4 sm:px-6 inset-x-0 top-0 h-20 bg-blue-700 text-white w-full"
    >
        <Link
            :href="route('login')"
            class="flex items-center flex-shrink-0 px-4"
        >
            <img
                class="h-10 sm:h-14 w-auto"
                src="https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png"
                alt="PSU Logo"
            />
            <span
                class="ml-2 text-base sm:text-md md:text-2xl text-white font-semibold"
            >
                PANGASINAN STATE UNIVERSITY
            </span>
        </Link>
    </nav>
</template>
