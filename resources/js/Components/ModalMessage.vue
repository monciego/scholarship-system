<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
const show = ref(true);
</script>

<template>
    <div
        v-if="$page.props.flash.successModal"
        class="relative z-10"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        v-show="show"
    >
        <div
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        ></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div
                class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0"
            >
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                >
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="text-blue-600"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                        fill="none"
                                    ></path>
                                    <path d="M4 5h2"></path>
                                    <path d="M5 4v2"></path>
                                    <path d="M11.5 4l-.5 2"></path>
                                    <path d="M18 5h2"></path>
                                    <path d="M19 4v2"></path>
                                    <path d="M15 9l-1 1"></path>
                                    <path d="M18 13l2 -.5"></path>
                                    <path d="M18 19h2"></path>
                                    <path d="M19 18v2"></path>
                                    <path
                                        d="M14 16.518l-6.518 -6.518l-4.39 9.58a1 1 0 0 0 1.329 1.329l9.579 -4.39z"
                                    ></path>
                                </svg>
                            </div>
                            <div
                                class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left"
                            >
                                <h3
                                    class="text-base font-semibold leading-6 text-gray-900"
                                    id="modal-title"
                                >
                                    {{ $page.props.flash.successModal }}
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Thank you for submitting your
                                        scholarship application form! Your
                                        submission has been received. We will
                                        carefully review your application and
                                        notify you of the outcome once the
                                        evaluation process is complete.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                    >
                        <Link
                            :href="route('homepage.index')"
                            preserve-scroll
                            class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto"
                        >
                            Explore More Scholarships
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
