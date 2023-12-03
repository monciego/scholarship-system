<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import dayjs from "dayjs";
import RejectedAcademicApplicant from "./partials/RejectedAcademicApplicant.vue";
import RejectedGovernmentApplicant from "./partials/RejectedGovernmentApplicant.vue";
import RejectedPrivateApplicant from "./partials/RejectedPrivateApplicant.vue";
defineProps(["rejectedApplicant", "decodedRequirements"]);
</script>

<template>
    <Head title="Rejected Applicant Information" />
    <AuthenticatedLayout>
        <section class="pb-20">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ rejectedApplicant.scholarship.scholarshipName }}
                        <span class="text-sm">
                            (SY)
                            {{
                                dayjs(
                                    rejectedApplicant.scholarship.school_year
                                        .start_school_year
                                ).year()
                            }}
                            to
                            {{
                                dayjs(
                                    rejectedApplicant.scholarship.school_year
                                        .end_school_year
                                ).year()
                            }}
                        </span>
                        <button
                            v-if="
                                rejectedApplicant.approve === 0 &&
                                rejectedApplicant.reject === 0
                            "
                            class="px-3 ml-4 py-1.5 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-yellow-600 hover:bg-yellow-600 text-white"
                        >
                            <span class="xs:block text-xs">Pending</span>
                        </button>
                        <button
                            v-if="
                                rejectedApplicant.approve === 1 &&
                                rejectedApplicant.reject === 0
                            "
                            class="px-3 ml-4 py-1.5 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                        >
                            <span class="xs:block text-xs">Approved</span>
                        </button>
                        <button
                            v-if="
                                rejectedApplicant.approve === 0 &&
                                rejectedApplicant.reject === 1
                            "
                            class="px-3 ml-4 py-1.5 cursor-default font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-red-700 hover:bg-red-600 text-white"
                        >
                            <span class="xs:block text-xs">Rejected</span>
                        </button>
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Submitted on
                        {{
                            dayjs(rejectedApplicant.created_at).format(
                                "MMM D, YYYY"
                            )
                        }}
                    </p>
                </div>
            </div>

            <RejectedPrivateApplicant
                :rejectedPrivateApplicant="rejectedApplicant"
            />
            <RejectedGovernmentApplicant
                :rejectedGovernmentApplicant="rejectedApplicant"
            />
            <RejectedAcademicApplicant
                :rejectedAcademicApplicant="rejectedApplicant"
                :decodedRequirements="decodedRequirements"
            />
        </section>
    </AuthenticatedLayout>
</template>
