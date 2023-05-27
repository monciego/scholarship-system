<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <nav
        class="relative flex items-center justify-between sm:h-10 md:justify-center"
        aria-label="Global"
    >
        <div
            class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0"
        >
            <div class="flex items-center justify-between w-full md:w-auto">
                <Link href="/">
                    <span class="sr-only">Logo</span>
                    <img
                        class="h-10 w-auto sm:h-12 md:h-14"
                        src="https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png"
                        alt=""
                    />
                </Link>
            </div>
        </div>

        <div
            class="md:absolute flex md:items-center md:justify-end md:inset-y-0 md:right-0"
        >
            <span class="inline-flex rounded-md shadow">
                <a
                    href=""
                    class="inline-flex items-center px-4 py-2 border border-transparent text-xs sm:text-sm md:text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    <svg
                        class="mr-2"
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 24 24"
                        fill="#fff"
                    >
                        <path
                            d="M24 0l-6 22-8.129-7.239 7.802-8.234-10.458 7.227-7.215-1.754 24-12zm-15 16.668v7.332l3.258-4.431-3.258-2.901z"
                        ></path>
                    </svg>
                    Contact Us
                </a>
            </span>
        </div>
    </nav>
</template>
