<script setup>
import InputError from "@/Components/InputError.vue";
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

        <!--    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ scholarship.scholarshipName }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Use a permanent address where you can receive mail.
                </p>
            </div>
            <form
                @submit.prevent="
                    submitApplicationForm.post(
                        route('submit-application-form', scholarship.id),
                        {
                            onSuccess: () => submitApplicationForm.reset(),
                        }
                    )
                "
            >
                <div
                    v-for="formInput in scholarship.scholarship_form_editor"
                    :key="formInput.id"
                    class="space-y-6 sm:space-y-5"
                >
                    <div
                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 py-5"
                    >
                        <label
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                        >
                            {{ formInput.label }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input
                                type="text"
                                :id="formInput.id"
                                class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                            />
                        </div>
                    </div>
                    <div
                        v-else-if="formInput.type === 'select'"
                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 py-5"
                    >
                        <label
                            :for="formInput.id"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                        >
                            {{ formInput.label }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select
                                v-for="options in JSON.parse(formInput.data)"
                                :key="options.uuid"
                                :id="formInput.id"
                                name="country"
                                class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                                <option
                                    v-for="option in options"
                                    :key="option.uuid"
                                    :value="option.text"
                                >
                                    {{ option.text }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div
                        v-else-if="formInput.type === 'textarea'"
                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 py-5"
                    >
                        <label
                            :for="formInput.id"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                        >
                            {{ formInput.label }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <textarea
                                :id="formInput.id"
                                rows="3"
                                class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"
                            ></textarea>
                            <p class="mt-2 text-sm text-gray-500">
                                Write a few sentences about yourself.
                            </p>
                        </div>
                    </div>

                    <div
                        v-else-if="formInput.type === 'checkbox'"
                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 py-5"
                    >
                        <div>
                            <div
                                class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                            >
                                {{ formInput.label }}
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:col-span-2">
                            <div
                                v-for="options in JSON.parse(formInput.data)"
                                :key="options.uuid"
                                class="max-w-lg space-y-4"
                            >
                                <div
                                    v-for="option in options"
                                    :key="option.uuid"
                                    class="relative flex items-start"
                                >
                                    <div class="flex items-center h-5">
                                        <input
                                            :id="option.uuid"
                                            type="checkbox"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label
                                            :for="option.uuid"
                                            class="font-medium text-gray-700"
                                        >
                                            {{ option.text }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        v-else-if="formInput.type === 'radio'"
                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 py-5"
                    >
                        <div>
                            <div
                                class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                            >
                                {{ formInput.label }}
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:col-span-2">
                            <div
                                v-for="options in JSON.parse(formInput.data)"
                                :key="options.uuid"
                                class="max-w-lg space-y-4"
                            >
                                <div
                                    v-for="option in options"
                                    :key="option.uuid"
                                    class="flex items-center"
                                >
                                    <input
                                        :id="option.uuid"
                                        :name="'radio' + formInput.id"
                                        type="radio"
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    />
                                    <label
                                        :for="option.uuid"
                                        class="ml-3 block text-sm font-medium text-gray-700"
                                    >
                                        {{ option.text }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button
                            type="button"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div> -->
    </section>
</template>
