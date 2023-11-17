<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import dayjs from "dayjs";

defineProps(["applicant"]);
</script>

<template>
    <Head title="Applied Scholarship Information" />
    <AuthenticatedLayout>
        <section class="pb-20">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ applicant.scholarship.scholarshipName }}
                        <span class="text-sm">
                            (SY)
                            {{
                                dayjs(
                                    applicant.scholarship.school_year
                                        .start_school_year
                                ).year()
                            }}
                            to
                            {{
                                dayjs(
                                    applicant.scholarship.school_year
                                        .end_school_year
                                ).year()
                            }}
                        </span>
                        <button
                            v-if="
                                applicant.approve === 0 &&
                                applicant.reject === 0
                            "
                            class="px-3 ml-4 py-1.5 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-yellow-600 hover:bg-yellow-600 text-white"
                        >
                            <span class="xs:block text-xs">Pending</span>
                        </button>
                        <button
                            v-if="
                                applicant.approve === 1 &&
                                applicant.reject === 0
                            "
                            class="px-3 ml-4 py-1.5 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                        >
                            <span class="xs:block text-xs">Approved</span>
                        </button>
                        <button
                            v-if="
                                applicant.approve === 0 &&
                                applicant.reject === 1
                            "
                            class="px-3 ml-4 py-1.5 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-red-700 hover:bg-red-600 text-white"
                        >
                            <span class="xs:block text-xs">Rejected</span>
                        </button>
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Submitted on
                        {{ dayjs(applicant.created_at).format("MMM D, YYYY") }}
                    </p>
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Student ID
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.student_id }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Campus
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.campus }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Degree
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.degree }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        High School General Average
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.average }}
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Admission Test Score
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.admission_test_score }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Email Address
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.email }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        First Name
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.first_name }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Middle Name
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.middle_name }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <p
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Last Name
                    </p>
                    <div class="mt-2">
                        <div
                            class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ applicant.last_name }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
