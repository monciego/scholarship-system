<script setup>
defineProps(["academicScholar", "decodedRequirements"]);
import { ref } from "vue";

const isModalOpen = ref(false);
const modalFileIndex = ref(null);
const modalImageIndex = ref(null);

const openModal = (fileIndex, imageIndex) => {
    modalFileIndex.value = fileIndex;
    modalImageIndex.value = imageIndex;
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
    modalFileIndex.value = null;
    modalImageIndex.value = null;
};
</script>

<template>
    <div
        v-if="
            academicScholar.scholarship.scholarshipType ===
            'academic scholarship'
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
                        {{ academicScholar.scholarship.scholarshipName }}
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
                        {{ academicScholar.student_id }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Campus</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ academicScholar.campus }}
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
                        {{ academicScholar.degree }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >High School General Average</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ academicScholar.average }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Admission Test Score</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ academicScholar.admission_test_score }}
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
                        {{ academicScholar.email }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >First Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ academicScholar.first_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Middle Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ academicScholar.middle_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Last Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ academicScholar.last_name }}
                    </div>
                </div>
            </div>
        </div>

        <div v-if="academicScholar.remarks" class="mt-4">
            <span v-if="academicScholar.approve === 1"> Approve</span>
            <span v-if="academicScholar.reject === 1"> Reject</span>
            Remarks:

            <div class="sm:col-span-3">
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ academicScholar.remarks }}
                    </div>
                </div>
            </div>
        </div>

        <div class="flex mt-6 gap-2 items-center">
            <h2>Requirements:</h2>
        </div>
        <div
            v-for="(file, fileIndex) in decodedRequirements"
            :key="fileIndex"
            class="mt-4"
        >
            <p>
                {{
                    academicScholar.scholarship.requirements.split("|")[
                        fileIndex
                    ]
                }}:
            </p>
            <div
                class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
            >
                <div
                    class="group relative cursor-pointer"
                    v-for="(image, imageIndex) in file"
                    :key="imageIndex"
                >
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80"
                    >
                        <img
                            :src="`/storage/${image}`"
                            alt="Requirements"
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full"
                            @click="openModal(fileIndex, imageIndex)"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div
            v-if="isModalOpen"
            class="fixed z-[1000] inset-0 my-4 flex items-center justify-center"
        >
            <div
                class="fixed inset-0 bg-black opacity-75"
                @click="closeModal"
            ></div>
            <div class="relative z-10 bg-white rounded p-4 max-w-2xl mx-auto">
                <div class="mt-4">
                    <div class="flex items- justify-between">
                        <p>
                            {{
                                academicScholar.scholarship.requirements.split(
                                    "|"
                                )[modalFileIndex]
                            }}:
                        </p>
                        <button
                            @click="closeModal"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none"
                        >
                            Close
                        </button>
                    </div>
                    <div class="">
                        <div class="mt-4">
                            <img
                                :src="`/storage/${decodedRequirements[modalFileIndex][modalImageIndex]}`"
                                alt="Requirements"
                                class="h-[30rem] w-[25rem]"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
