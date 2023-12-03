<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps(["scholar"]);
</script>

<template>
    <Head title="Private Scholar Information" />
    <AuthenticatedLayout>
        <section class="mx-auto pt-5 pb-8 px-4 sm:px-6">
            <header class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div
                        class="h-8 w-8 text-xs text-white tracking-tighter rounded-full bg-green-600 flex items-center justify-center"
                    >
                        {{ scholar.first_name.charAt(0) }}
                        {{ scholar.last_name.charAt(0) }}
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h2>
                                {{ scholar.first_name }}
                                {{ scholar.last_name }}
                            </h2>
                            <div
                                class="bg-green-700 text-white rounded py-1 px-4 text-xs"
                            >
                                Scholar
                            </div>
                        </div>

                        <a
                            target="__blank"
                            :href="`mailto:${scholar.email}`"
                            class="block text-xs text-indigo-600 underline"
                            >{{ scholar.email }}</a
                        >
                    </div>
                </div>

                <div>
                    <Link
                        :href="route('private-scholars.index')"
                        preserve-scroll
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Back
                    </Link>
                </div>
            </header>

            <div
                class="mt-10 grid grid-cols-1 relative gap-x-6 gap-y-4 sm:grid-cols-6"
            >
                <span
                    class="stamp right-10 -top-20 z-[1] opacity-10 absolute is-approved"
                    >Private Scholar</span
                >
                <div class="sm:col-span-3">
                    <span
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Scholarship</span
                    >
                    <div class="mt-2">
                        <div
                            class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ scholar.scholarship.scholarshipName }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <span
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Student ID</span
                    >
                    <div class="mt-2">
                        <div
                            class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ scholar.student_id }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <span
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >First Name</span
                    >
                    <div class="mt-2">
                        <div
                            class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ scholar.first_name }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <span
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Middle Name</span
                    >
                    <div class="mt-2">
                        <div
                            class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ scholar.middle_name }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <span
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Last Name</span
                    >
                    <div class="mt-2">
                        <div
                            class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ scholar.last_name }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <span
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Degree Program</span
                    >
                    <div class="mt-2">
                        <div
                            class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ scholar.degree }}
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <span
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Email Address</span
                    >
                    <div class="mt-2">
                        <div
                            class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ scholar.email }}
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="scholar.remarks" class="mt-4">
                <span v-if="scholar.approve === 1"> Approve</span>
                <span v-if="scholar.reject === 1"> Reject</span>
                Remarks:

                <div class="sm:col-span-3">
                    <div class="mt-2">
                        <div
                            class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            {{ scholar.remarks }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
