<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
const props = defineProps(["rejectedApplicants", "schoolYears"]);

import { computed, ref } from "vue";
const selectedScholarship = ref("all");
const selectedSchoolYear = ref("all");
import dayjs from "dayjs";

const filteredRejectedApplicants = computed(() => {
    let applicants = props.rejectedApplicants;

    if (selectedScholarship.value && selectedScholarship.value !== "all") {
        applicants = applicants.filter(
            (applicant) =>
                applicant.scholarship.scholarshipType ===
                selectedScholarship.value
        );
    }

    if (selectedSchoolYear.value && selectedSchoolYear.value !== "all") {
        applicants = applicants.filter(
            (applicant) =>
                applicant.scholarship.school_year.id.toString() ===
                selectedSchoolYear.value
        );
    }

    return applicants;
});

const isGraduated = (scholar) => {
    const currentYear = new Date().getFullYear();
    const enrollmentYear = parseInt(scholar.student_id.substring(0, 2)) + 2000;
    const courseDuration = 4; // Assuming a 4-year course, adjust as needed
    return currentYear - enrollmentYear >= courseDuration;
};
</script>

<template>
    <Head title="Rejected Applicants" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">
                Rejected Applicants
            </h2>

            <div class="flex items-center gap-2">
                <label
                    for="scholarshipFilter"
                    class="block text-sm sr-only font-medium leading-6 text-gray-900"
                    >Filter By Scholarship</label
                >
                <div class="mt-2">
                    <select
                        id="scholarshipFilter"
                        v-model="selectedScholarship"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                    >
                        <option value="all">All Scholarships</option>
                        <option value="academic scholarship">
                            Academic Scholarship
                        </option>
                        <option value="government scholarship">
                            Government Scholarship
                        </option>
                        <option value="private scholarship">
                            Private Scholarship
                        </option>
                    </select>
                </div>

                <div class="mt-2">
                    <label
                        for="schoolYearFilter"
                        class="block text-sm sr-only font-medium leading-6 text-gray-900"
                        >Filter By School Year</label
                    >
                    <select
                        id="schoolYearFilter"
                        v-model="selectedSchoolYear"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                    >
                        <option value="all">All School Years</option>
                        <option
                            v-for="year in schoolYears"
                            :key="year.id"
                            :value="year.id.toString()"
                        >
                            {{ dayjs(year.start_school_year).year() }} -
                            {{ dayjs(year.end_school_year).year() }}
                        </option>
                    </select>
                </div>
            </div>
        </header>

        <div
            v-if="rejectedApplicants.length === 0"
            class="flex flex-col gap-8 items-center justify-center mt-16"
        >
            <img
                class="h-60"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center sm:text-xl uppercase">
                No Reject Applicants at the Moment
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
                        <th scope="col" class="px-6 py-3">Scholarship Type</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="rejectedApplicant of filteredRejectedApplicants"
                        :key="rejectedApplicant.id"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ rejectedApplicant.student_id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ rejectedApplicant.last_name }},
                            {{ rejectedApplicant.first_name }}
                            {{ rejectedApplicant.middle_name?.charAt(0) }}.
                        </td>
                        <td class="px-6 py-4">
                            {{ rejectedApplicant.scholarship.scholarshipName }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ rejectedApplicant.scholarship.scholarshipType }}
                        </td>
                        <td class="px-6 py-4 truncate text-ellipsis">
                            <Link
                                :href="
                                    route('total-of-rejected-applicants.show', {
                                        id: rejectedApplicant.id,
                                    })
                                "
                                class="px-3 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                            >
                                <span class="xs:block text-xs"
                                    >More Details</span
                                >
                            </Link>
                            <span
                                v-if="isGraduated(rejectedApplicant)"
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
