<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import ApproveApplicantsWithRemarks from "./ApproveApplicantsWithRemarks.vue";
import RejectApplicantsWithRemarksVue from "./RejectApplicantsWithRemarks.vue";
import { computed, ref } from "vue";
const props = defineProps(["applicants"]);

const selectedScholarship = ref("all");

const filteredApplicants = computed(() => {
    if (!selectedScholarship.value || selectedScholarship.value === "all") {
        return props.applicants;
    }
    return props.applicants.filter(
        (applicant) =>
            applicant.scholarship.scholarshipType === selectedScholarship.value
    );
});

console.log(filteredApplicants);
</script>

<template>
    <Head title="Applicants" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">Applicants</h2>

            <div>
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
            </div>
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
                No Applicants at the Moment
            </h2>
        </div>

        <div
            class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg"
            v-else
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
                        v-for="applicant of filteredApplicants"
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
                        <td class="px-6 flex gap-1 items-center py-4">
                            <ApproveApplicantsWithRemarks
                                :applicant="applicant"
                            />
                            <RejectApplicantsWithRemarksVue
                                :applicant="applicant"
                            />
                            <Link
                                :href="
                                    route('applicants.show', {
                                        id: applicant.id,
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
