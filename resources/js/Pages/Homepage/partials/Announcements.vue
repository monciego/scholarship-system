<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import dayjs from "dayjs";
defineProps(["announcements"]);
</script>
<template>
    <div
        v-for="announcement in announcements"
        :key="announcement.id"
        class="p-6 bg-white border border-gray-200 rounded-lg shadow"
    >
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                {{ announcement.title }}
            </h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 line-clamp-3">
            {{ announcement.body }}
        </p>
        <Link
            :href="
                route('showAnnouncement', {
                    id: announcement.id,
                })
            "
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
        >
            Read more
            <svg
                class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 10"
            >
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9"
                />
            </svg>
        </Link>
    </div>
</template>
