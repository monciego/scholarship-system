<script setup>
defineProps(["scholarships"]);

import { Link, usePage } from "@inertiajs/vue3";
import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";
dayjs.extend(LocalizedFormat);
</script>

<template>
    <div
        v-for="scholarship in scholarships"
        :key="scholarship.id"
        class="flex flex-col bg-white rounded-2xl shadow-xl"
    >
        <div class="flex-1 relative pt-16 px-6 pb-4 md:px-8">
            <div
                v-if="scholarship.status === 'onHold'"
                class="bg-yellow-500 inline py-2 px-4 text-white rounded absolute top-4 right-4"
            >
                ON HOLD
            </div>
            <div
                class="absolute top-0 p-4 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 text-white"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"
                    />
                </svg>
            </div>
            <h3 class="text-xl font-medium text-gray-900">
                {{ scholarship.scholarshipName }}
            </h3>
            <p class="mt-4 mb-2 line-clamp-3 text-base text-gray-500">
                {{ scholarship.details }}
            </p>
            <a
                href="#"
                class="text-base font-medium text-indigo-700 hover:text-indigo-600"
            >
                More Details <span aria-hidden="true"> &rarr;</span>
            </a>

            <div class="mt-2">
                <p>
                    Slots: {{ scholarship.application_form.length }} /
                    {{ scholarship.slot }}
                </p>
                <p>Available For: {{ scholarship.availableFor }}</p>
                <p>
                    Deadline: {{ dayjs(scholarship.deadlineAt).format("LL") }}
                </p>
            </div>
        </div>
        <div class="p-6 pt-0 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
            <button
                v-if="scholarship.status === 'onHold'"
                type="button"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md cursor-not-allowed shadow-sm text-white bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
            >
                On Hold
            </button>
            <Link
                :href="
                    route('application-form', {
                        id: scholarship.id,
                    })
                "
                v-else
                class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Apply Scholarship
            </Link>
        </div>
    </div>
</template>
