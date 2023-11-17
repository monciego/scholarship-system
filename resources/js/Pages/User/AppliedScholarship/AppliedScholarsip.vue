<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
defineProps(["appliedScholarships"]);
</script>

<template>
    <Head title="Applicants" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">
                Applied Scholarships
            </h2>
        </header>

        <div
            v-if="appliedScholarships.length === 0"
            class="flex flex-col items-center justify-center mt-16"
        >
            <img
                class="h-60 mb-8"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center mb-4 sm:text-xl uppercase">
                Currently, no applied scholarships.
            </h2>
            <Link
                :href="route('homepage.index')"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Explore & Apply for Scholarships
            </Link>
        </div>
        <!-- -->

        <div
            v-else
            class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg"
        >
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-indigo-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Student ID</th>
                        <th scope="col" class="px-6 py-3">Scholarship</th>
                        <th scope="col" class="px-6 py-3">Scholarship Type</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="appliedScholarship of appliedScholarships"
                        :key="appliedScholarship.id"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ appliedScholarship.student_id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ appliedScholarship.scholarship.scholarshipName }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ appliedScholarship.scholarship.scholarshipType }}
                        </td>
                        <td class="px-6 py-4">
                            <!-- {{ applicant.scholarship.scholarshipName }} -->
                            <button
                                v-if="
                                    appliedScholarship.approve === 0 &&
                                    appliedScholarship.reject === 0
                                "
                                class="px-3 py-2 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-red-700 hover:bg-red-600 text-white"
                            >
                                <span class="xs:block text-xs">Pending</span>
                            </button>
                            <button
                                v-if="
                                    appliedScholarship.approve === 1 &&
                                    appliedScholarship.reject === 0
                                "
                                class="px-3 py-2 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                            >
                                <span class="xs:block text-xs">Approved</span>
                            </button>
                            <button
                                v-if="
                                    appliedScholarship.approve === 0 &&
                                    appliedScholarship.reject === 1
                                "
                                class="px-3 py-2 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-red-700 hover:bg-red-600 text-white"
                            >
                                <span class="xs:block text-xs">Rejected</span>
                            </button>
                        </td>
                        <td class="px-6 flex gap-1 items-center py-4">
                            <Link
                                :href="
                                    route('applied-scholarships.show', {
                                        id: appliedScholarship.id,
                                    })
                                "
                                class="font-medium ml-4 text-indigo-600 hover:underline"
                            >
                                More</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
