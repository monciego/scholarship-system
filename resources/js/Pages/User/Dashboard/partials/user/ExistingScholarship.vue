<script setup>
defineProps(["filteredScholarships"]);
</script>

<template>
    <div
        class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-gray-200"
    >
        <header class="px-5 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Existing Scholarship</h2>
        </header>

        <div
            v-if="filteredScholarships.length === 0"
            class="flex flex-col gap-8 items-center justify-center mt-4"
        >
            <img
                class="h-24"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center uppercase">No Existing Scholarship</h2>
        </div>

        <div v-else class="p-3">
            <div>
                <ul class="my-1">
                    <li
                        class="flex px-2"
                        v-for="(value, key) in filteredScholarships"
                        :key="key"
                    >
                        <div
                            class="w-9 h-9 rounded-full flex items-center justify-center shrink-0 bg-indigo-500 my-2 mr-3"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 text-indigo-50"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"
                                />
                            </svg>
                        </div>
                        <div
                            class="grow flex items-center border-b border-gray-100 text-sm py-2"
                        >
                            <div class="grow flex justify-between">
                                <div class="self-center">
                                    {{ value }}
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
