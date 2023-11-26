<script setup>
defineProps(["appliedScholarship"]);
</script>

<template>
    <div
        v-if="
            appliedScholarship.scholarship.scholarshipType ===
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
                        {{ appliedScholarship.scholarship.scholarshipName }}
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
                        {{ appliedScholarship.student_id }}
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
                        {{ appliedScholarship.first_name }}
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
                        {{ appliedScholarship.middle_name }}
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
                        {{ appliedScholarship.last_name }}
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
                        {{ appliedScholarship.degree }}
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
                        {{ appliedScholarship.email }}
                    </div>
                </div>
            </div>
        </div>

        <div v-if="appliedScholarship.remarks" class="mt-4">
            <span v-if="appliedScholarship.approve === 1"> Approve</span>
            <span v-if="appliedScholarship.reject === 1"> Reject</span>
            Remarks:

            <div class="sm:col-span-3">
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.remarks }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
