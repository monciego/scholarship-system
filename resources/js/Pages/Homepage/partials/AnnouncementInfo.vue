<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { PaperClipIcon } from "@heroicons/vue/20/solid";
import { Head, Link } from "@inertiajs/vue3";
import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";
import BackgroundPattern from "./BackgroundPattern.vue";
import Header from "./Header.vue";

dayjs.extend(LocalizedFormat);
defineProps(["announcement"]);
</script>
<template>
    <div class="relative overflow-hidden">
        <BackgroundPattern />
        <div class="relative pt-6 pb-12">
            <div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    <Header />
                </div>
            </div>
        </div>
    </div>

    <div class="relative overflow-hidden">
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <h1>
                    <span
                        class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase"
                        >Announcement</span
                    >
                    <span
                        class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl"
                    >
                        {{ announcement.title }}
                    </span>
                </h1>
                <p class="text-sm mt-2 text-center">
                    {{ announcement.user.name }} -
                    {{ dayjs(announcement.created_at).format("MMMM DD, YYYY") }}
                </p>
                <p class="mt-8 text-xl text-gray-500 leading-8">
                    {{ announcement.body }}
                </p>
            </div>
        </div>
    </div>
</template>
