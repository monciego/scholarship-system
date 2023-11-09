<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import dayjs from "dayjs";

defineProps(["school_years"]);

const form = useForm({
    scholarshipName: "",
    school_year_id: "",
    deadlineAt: "",
    availableFor: "",
    status: "",
    scholarshipType: "",
    slot: "",
    applicationLink: "",
    details: "",
});

function submit() {
    router.post(route("scholarship.store"), form, {
        onSuccess: () => form.reset(),
    });

    const listenForChanges = () => {
        {
            console.log(Echo.channel("scholarships"));
            Echo.channel("scholarships").listen(
                "ScholarshipPublished",
                (post) => {
                    if (!("Notification" in window)) {
                        alert("Web Notification is not supported");
                        return;
                    } else if (Notification.permission === "granted") {
                        // Check whether notification permissions have already been granted;
                        // if so, create a notification
                        const notification = new Notification(
                            "New Scholarship Available!",
                            {
                                body: post.scholarshipName,
                                icon: "https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png",
                            }
                        );
                        notification.onclick = () => {
                            window.open("/");
                        };
                        // …
                    }
                }
            );
        }
    };
    listenForChanges();
}

const addPost = (scholarshipName, details) => {
    // check if entries are not empty
    if (!scholarshipName || !details) {
        console.log("nope");
    }
};
</script>
<template>
    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <form
            @submit.prevent="submit"
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
                            class="sm:col-span-3"
                            v-if="
                                form.scholarshipType !== 'private scholarship'
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
                            <InputError
                                class="mt-2"
                                :message="form.errors.details"
                            />
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
                        @click="addPost(form.scholarshipName, form.details)"
                        type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Save
                    </button>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
