<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
const props = defineProps(["scholarships", "schoolYears"]);

import { computed, ref } from "vue";
const selectedScholarship = ref("all");
const selectedSchoolYear = ref("all");
import dayjs from "dayjs";

const filteredScholarships = computed(() => {
    let scholarships = props.scholarships;

    if (selectedScholarship.value && selectedScholarship.value !== "all") {
        scholarships = scholarships.filter(
            (scholarship) =>
                scholarship.scholarshipType === selectedScholarship.value
        );
    }

    if (selectedSchoolYear.value && selectedSchoolYear.value !== "all") {
        scholarships = scholarships.filter(
            (scholarship) =>
                scholarship.school_year.id.toString() ===
                selectedSchoolYear.value
        );
    }

    return scholarships;
});
</script>

<template>
    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">Scholarships</h2>

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
            v-if="scholarships.length === 0"
            class="flex flex-col items-center justify-center mt-16"
        >
            <img
                class="h-60 mb-8"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center mb-4 sm:text-xl uppercase">
                No Available Scholarships at the Moment
            </h2>
        </div>

        <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-indigo-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Scholarship Name</th>
                        <th scope="col" class="px-6 py-3">Scholarship Type</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Created by</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(scholarship, index) in filteredScholarships"
                        :key="index"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ scholarship.scholarshipName }}
                        </th>
                        <td class="px-6 py-4 capitalize">
                            {{ scholarship.scholarshipType }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ scholarship.status }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ scholarship.representative.name }}
                        </td>
                        <td class="px-6 py-4">
                            <Link
                                :href="
                                    route('total-of-scholarships.show', {
                                        id: scholarship.id,
                                    })
                                "
                                class="font-medium ml-4 text-indigo-600 hover:underline"
                            >
                                More
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
