<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import dayjs from "dayjs";
import AcademicApplicant from "./partials/AcademicApplicant.vue";
import GovernmentApplicant from "./partials/GovernmentApplicant.vue";
import PrivateApplicant from "./partials/PrivateApplicant.vue";
defineProps(["applicant", "decodedRequirements"]);
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

            <PrivateApplicant :privateApplicant="applicant" />
            <GovernmentApplicant :governmentApplicant="applicant" />
            <AcademicApplicant
                :academicApplicant="applicant"
                :decodedRequirements="decodedRequirements"
            />
        </section>
    </AuthenticatedLayout>
</template>
