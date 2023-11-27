<script setup>
defineProps(["appliedScholarship"]);
</script>

<template>
    <div
        v-if="
            appliedScholarship.scholarship.scholarshipType ===
            'government scholarship'
        "
    >
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    Student ID
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.student_id }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    Campus
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.campus }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    Degree
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.degree }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    High School General Average
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.average }}
                    </div>
                </div>
            </div>

            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    Admission Test Score
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.admission_test_score }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    Email Address
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.email }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    First Name
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.first_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    Middle Name
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.middle_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <p class="block text-sm font-medium leading-6 text-gray-900">
                    Last Name
                </p>
                <div class="mt-2">
                    <div
                        class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.last_name }}
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
