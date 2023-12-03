<script setup>
import Header from "@/Shared/Auth/Header.vue";
import Footer from "@/Shared/Auth/Footer.vue";
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-100"
    >
        <Header />
        <div class="sm:mx-auto px-6 sm:px-0 mt-28 sm:mt-10 w-full sm:max-w-lg">
            <div
                class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 overflow-y-scroll"
            >
                <slot />
            </div>
        </div>
        <Footer />
    </div>
</template>
