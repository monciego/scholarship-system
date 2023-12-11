<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import dayjs from "dayjs";

const props = defineProps({
    scholarship: Object,
    school_years: Array,
});

const scholarship = props.scholarship;
const school_years = props.school_years;

const form = useForm({
    scholarshipName: scholarship.scholarshipName,
    scholarshipType: scholarship.scholarshipType,
    school_year_id: scholarship.school_year_id,
    deadlineAt: scholarship.deadlineAt,
    availableFor: scholarship.availableFor,
    status: scholarship.status,
    slot: scholarship.slot,
    applicationLink: scholarship.applicationLink,
    details: scholarship.details,
    requirements: scholarship.requirements
        ? scholarship.requirements.split("|")
        : [""],
});

const addRequirement = () => {
    // Add a new empty requirement when the button is clicked
    form.requirements.push("");
};

const removeRequirement = (index) => {
    // Remove the requirement at the specified index
    form.requirements.splice(index, 1);
};
</script>
<template>
    <Head title="Edit Scholarship" />

    <AuthenticatedLayout>
        <form
            @submit.prevent="
                form.put(route('scholarship.update', scholarship.id))
            "
            class="space-y-8 divide-y divide-gray-200"
        >
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Edit Scholarsip
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Update details about the scholarship
                        </p>
                    </div>
                </div>

                <div class="pt-8">
                    <div
                        class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6"
                    >
                        <div class="sm:col-span-3">
                            <InputLabel for="scholarship-type"
                                >Scholarship Type</InputLabel
                            >
                            <div class="mt-2">
                                <select
                                    v-model="form.scholarshipType"
                                    id="scholarship-type"
                                    name="scholarshipType"
                                    autocomplete="scholarship-type"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                >
                                    <option value="academic scholarship">
                                        Academic Scholarship
                                    </option>
                                    <option value="government scholarship">
                                        Government Scholarship
                                    </option>
                                    <option value="private scholarship">
                                        Private Scholarship
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel
                                for="scholarshipName"
                                value=" Scholarship name"
                            />
                            <div class="mt-1">
                                <TextInput
                                    v-model="form.scholarshipName"
                                    type="text"
                                    name="scholarshipName"
                                    id="scholarshipName"
                                    class="shadow-sm block w-full sm:text-sm rounded-md"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.scholarshipName"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel for="deadlineAt" value="Deadline" />
                            <div class="mt-1">
                                <TextInput
                                    v-model="form.deadlineAt"
                                    type="date"
                                    name="deadlineAt"
                                    id="deadlineAt"
                                    class="shadow-sm block w-full sm:text-sm rounded-md"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.deadlineAt"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel
                                for="availableFor"
                                value="Available For"
                            />
                            <div class="mt-1">
                                <TextInput
                                    v-model="form.availableFor"
                                    type="text"
                                    name="availableFor"
                                    id="availableFor"
                                    class="shadow-sm block w-full sm:text-sm rounded-md"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.availableFor"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel for="status" value="Status" />
                            <div class="mt-1">
                                <select
                                    v-model="form.status"
                                    id="status"
                                    name="status"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                >
                                    <option value="Available">Available</option>
                                    <option value="notAvailable">
                                        Not Available
                                    </option>
                                    <option value="onHold">On Hold</option>
                                </select>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.status"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel
                                for="school_year_id"
                                value="School Year"
                            />
                            <div class="mt-1">
                                <select
                                    v-model="form.school_year_id"
                                    id="school_year_id"
                                    name="school_year_id"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                >
                                    <option
                                        v-for="school_year in school_years"
                                        :key="school_year.id"
                                        :value="school_year.id"
                                    >
                                        {{
                                            dayjs(
                                                school_year.start_school_year
                                            ).year()
                                        }}
                                        -

                                        {{
                                            dayjs(
                                                school_year.end_school_year
                                            ).year()
                                        }}
                                    </option>
                                </select>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.school_year_id"
                                />
                            </div>
                        </div>

                        <div
                            class="sm:col-span-3 hidden"
                            v-if="
                                form.scholarshipType !==
                                    'private scholarship' &&
                                form.scholarshipType !==
                                    'government scholarship'
                            "
                        >
                            <InputLabel for="slot" value="Available Slots" />
                            <div class="mt-1">
                                <TextInput
                                    v-model="form.slot"
                                    type="number"
                                    name="slot"
                                    id="slot"
                                    class="shadow-sm block w-full sm:text-sm rounded-md"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.slot"
                                />
                            </div>
                        </div>

                        <div
                            class="sm:col-span-3"
                            v-if="
                                form.scholarshipType === 'private scholarship'
                            "
                        >
                            <InputLabel for="applicationLink">
                                Application Form Link
                                <span class="text-xs"
                                    >(for private scholarship)</span
                                ></InputLabel
                            >

                            <div class="mt-1">
                                <TextInput
                                    v-model="form.applicationLink"
                                    type="text"
                                    name="applicationLink"
                                    id="applicationLink"
                                    class="shadow-sm block w-full sm:text-sm rounded-md"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.applicationLink"
                                />
                            </div>
                        </div>
                    </div>

                    <div
                        class="sm:col-span-6 mt-4"
                        v-if="form.scholarshipType === 'academic scholarship'"
                    >
                        <div class="flex items-center">
                            <h2 class="block text-sm font-medium text-gray-700">
                                Requirements:
                            </h2>

                            <div class="relative inline-block group">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-5 h-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                                    />
                                </svg>

                                <div
                                    class="hidden text-xs w-[17rem] group-hover:block absolute bottom-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-4 py-3 rounded"
                                >
                                    Enter the requirement name. It will be
                                    displayed as a file input on the scholars'
                                    application form.
                                </div>
                            </div>
                        </div>

                        <div
                            class="mt-4"
                            v-for="(requirement, index) in form.requirements"
                            :key="index"
                        >
                            <InputLabel :for="'requirement[' + index + ']'">{{
                                form.requirements[index]
                            }}</InputLabel>
                            <div class="flex items-center space-x-2 mt-2">
                                <TextInput
                                    v-model="form.requirements[index]"
                                    :name="'requirement[' + index + ']'"
                                    :id="'requirement-' + index"
                                    class="shadow-sm py-2 px-4 block w-full sm:text-sm rounded-md"
                                />
                                <button
                                    @click="removeRequirement(index)"
                                    type="button"
                                    class="ml-2 inline-flex justify-center py-2 px-4 border border-red-500 rounded-md text-sm font-medium text-red-500 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                >
                                    Remove
                                </button>
                            </div>
                        </div>
                        <button
                            @click="addRequirement"
                            type="button"
                            class="mt-2 inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Add Requirement
                        </button>
                    </div>

                    <div class="sm:col-span-6 mt-4">
                        <InputLabel for="details" value="Details" />
                        <div class="mt-1">
                            <textarea
                                v-model="form.details"
                                id="details"
                                name="details"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"
                            ></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Write a few sentences about the scholarship.
                        </p>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <Link
                        :href="route('scholarship.index')"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Cancel
                    </Link>
                    <button
                        type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
