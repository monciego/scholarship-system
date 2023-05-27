<script setup>
let date = new Date().getFullYear();
</script>

<template>
    <footer>
        <div
            class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8"
        >
            <div>
                <p class="text-center text-sm sm:text-base text-gray-500">
                    &copy;
                    <span id="copyright">{{ date }}</span>
                    {{ " " }}
                    <a
                        target="__blank"
                        class="text-indigo-600 hover:underline"
                        href="https://main.psu.edu.ph/"
                        >Pangasinan State University</a
                    >. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>
