<script setup>
defineProps(["rejectedPrivateApplicant"]);
</script>

<template>
    <div
        v-if="
            rejectedPrivateApplicant.scholarship.scholarshipType ===
            'private scholarship'
        "
    >
        <div
            class="mt-10 grid grid-cols-1 relative gap-x-6 gap-y-4 sm:grid-cols-6"
        >
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Scholarship</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{
                            rejectedPrivateApplicant.scholarship.scholarshipName
                        }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Student ID</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ rejectedPrivateApplicant.student_id }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-2">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >First Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ rejectedPrivateApplicant.first_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-2">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Middle Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ rejectedPrivateApplicant.middle_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-2">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Last Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ rejectedPrivateApplicant.last_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Degree Program</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ rejectedPrivateApplicant.degree }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Email Address</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ rejectedPrivateApplicant.email }}
                    </div>
                </div>
            </div>
        </div>

        <div v-if="rejectedPrivateApplicant.remarks" class="mt-4">
            <span v-if="rejectedPrivateApplicant.approve === 1"> Approve</span>
            <span v-if="rejectedPrivateApplicant.reject === 1"> Reject</span>
            Remarks:

            <div class="sm:col-span-3">
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ rejectedPrivateApplicant.remarks }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
