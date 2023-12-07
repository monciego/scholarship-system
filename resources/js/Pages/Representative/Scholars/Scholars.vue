<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
defineProps(["applicants"]);

const isGraduated = (scholar) => {
    const currentYear = new Date().getFullYear();
    const enrollmentYear = parseInt(scholar.student_id.substring(0, 2)) + 2000;
    const courseDuration = 4; // Assuming a 4-year course, adjust as needed
    return currentYear - enrollmentYear >= courseDuration;
};
</script>

<template>
    <Head title="Scholars" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">Scholars</h2>
        </header>

        <div
            v-if="applicants.length === 0"
            class="flex flex-col gap-8 items-center justify-center mt-16"
        >
            <img
                class="h-60"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center sm:text-xl uppercase">
                No Scholars at the Moment
            </h2>
        </div>

        <div
            v-else
            class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg"
        >
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-indigo-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Student ID</th>
                        <th scope="col" class="px-6 py-3">Applicant Name</th>
                        <th scope="col" class="px-6 py-3">Scholarship</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="applicant of applicants"
                        :key="applicant.id"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ applicant.student_id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ applicant.last_name }},
                            {{ applicant.first_name }}
                            {{ applicant.middle_name?.charAt(0) }}.
                        </td>
                        <td class="px-6 py-4">
                            {{ applicant.scholarship.scholarshipName }}
                        </td>
                        <td class="px-6 py-4 truncate text-ellipsis">
                            <Link
                                :href="
                                    route('scholars.show', {
                                        id: applicant.id,
                                    })
                                "
                                class="px-3 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                            >
                                <span class="xs:block text-xs"
                                    >More Details</span
                                >
                            </Link>
                            <span
                                v-if="isGraduated(applicant)"
                                class="px-3 ml-2 py-1.5 font-medium text-xs inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-green-700 hover:bg-green-600 text-white"
                            >
                                Graduated
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
