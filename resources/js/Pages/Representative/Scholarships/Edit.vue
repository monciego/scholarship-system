<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps(["scholarship"]);
const form = useForm({
    scholarshipName: props.scholarship.scholarshipName,
    deadlineAt: props.scholarship.deadlineAt,
    availableFor: props.scholarship.availableFor,
    status: props.scholarship.status,
    slot: props.scholarship.slot,
    applicationLink: props.scholarship.applicationLink,
    details: props.scholarship.details,
});
</script>
<template>
    <Head title="Scholarships" />

    <AuthenticatedLayout>
        <form
        @submit.prevent="form.put(route('scholarship.update', scholarship.id))"

            class="space-y-8 divide-y divide-gray-200"
        >
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Create Scholarsip
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Provide details about the scholarship
                        </p>
                    </div>
                </div>

                <div class="pt-8">
                    <div
                        class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6"
                    >
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

                        <div class="sm:col-span-3">
                            <InputLabel for="applicationLink">
                                Application Form Link
                                <span class="text-xs"
                                    >(optional)</span
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

                        <div class="sm:col-span-6">
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