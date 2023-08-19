<script setup>
import InputError from "@/Components/InputError.vue";
import ModalMessage from "@/Components/ModalMessage.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

defineProps(["scholarship"]);

const user = usePage().props.auth.user;
const scholarshipProps = usePage().props.scholarship;

const form = useForm({
    user_id: user.id,
    scholarship_id: scholarshipProps.id,
    student_id: "",
    degree: "",
    campus: "Pangasinan State University - Alaminos City Campus",
    average: "",
    admission_test_score: "",
    email: user.email,
    first_name: "",
    middle_name: "",
    last_name: "",
});
</script>

<template>
    <Head title="Application Form" />
    <ModalMessage />

    <section class="max-w-7xl mx-auto pt-5 pb-8 px-4 sm:px-6 x">
        <header class="relative pb-5 border-b border-gray-200 sm:pb-0">
            <div class="md:flex md:items-center md:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Application Form
                </h3>
                <div class="mt-3 flex md:mt-0 md:absolute md:top-3 md:right-0">
                    <Link
                        :href="route('homepage.index')"
                        preserve-scroll
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Cancel Application
                    </Link>
                </div>
            </div>
            <div class="mt-4">
                <div class="hidden sm:block">
                    <nav class="-mb-px flex space-x-8">
                        <Link
                            :href="route('homepage.index')"
                            class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm"
                        >
                            View Scholarships
                        </Link>

                        <span
                            class="border-indigo-500 text-indigo-600 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page"
                        >
                            Application
                        </span>
                    </nav>
                </div>
            </div>
        </header>

        <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ scholarship.scholarshipName }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Use a permanent address where you can receive mail.
                </p>
            </div>
        </div>

        <form
            @submit.prevent="
                form.post(route('application.store'), {
                    onSuccess: () => form.reset(),
                })
            "
        >
            <input v-model="form.user_id" type="hidden" name="user_id" />
            <input
                v-model="form.scholarship_id"
                type="hidden"
                name="scholarship_id"
            />
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label
                        for="student-id"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Student ID</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.student_id"
                            type="text"
                            name="student_id"
                            id="student-id"
                            autocomplete="student-id"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.student_id"
                        />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label
                        for="campus"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Campus</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.campus"
                            type="text"
                            name="campus"
                            id="campus"
                            autocomplete="course"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.campus"
                        />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label
                        for="degree"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Degree Program</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.degree"
                            type="text"
                            name="degree"
                            id="degree"
                            autocomplete="course"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.degree"
                        />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label
                        for="average"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >High School General Average</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.average"
                            type="text"
                            name="average"
                            id="average"
                            autocomplete="highschool-average"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.average"
                        />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label
                        for="admission_test_score"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Admission Test Score</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.admission_test_score"
                            type="text"
                            name="admission_test_score"
                            id="admission_test_score"
                            autocomplete="admission_test_score"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.admission_test_score"
                        />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label
                        for="email"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Email Address</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.email"
                            type="email"
                            name="email"
                            id="email"
                            autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label
                        for="first_name"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >First Name</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.first_name"
                            type="text"
                            name="first_name"
                            id="first_name"
                            autocomplete="first-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.first_name"
                        />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label
                        for="middle_name"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Middle Name</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.middle_name"
                            type="text"
                            name="middle_name"
                            id="middle_name"
                            autocomplete="middle-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.middle_name"
                        />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label
                        for="last_name"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Last Name</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="form.last_name"
                            type="text"
                            name="last_name"
                            id="last_name"
                            autocomplete="last-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.last_name"
                        />
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <Link
                        href="/"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Cancel
                    </Link>
                    <button
                        type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Submit Application
                    </button>
                </div>
            </div>
        </form>
    </section>
</template>
