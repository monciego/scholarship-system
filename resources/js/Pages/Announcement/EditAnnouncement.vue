<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";

const props = defineProps({
    announcement: Object,
});

const announcement = props.announcement;

const form = useForm({
    title: announcement.title,
    body: announcement.body,
});
</script>
<template>
    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <form
            @submit.prevent="
                form.put(route('announcement.update', announcement.id))
            "
            class="space-y-4 divide-y divide-gray-200"
        >
            <div>
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Edit {{ announcement.title }}
                        </h3>
                    </div>
                </div>

                <div
                    class="grid grid-cols-1 mt-6 gap-y-4 gap-x-4 sm:grid-cols-6"
                >
                    <div class="sm:col-span-6">
                        <InputLabel for="title" value="Announcement Title" />
                        <div class="mt-1">
                            <TextInput
                                v-model="form.title"
                                type="text"
                                name="title"
                                id="title"
                                class="shadow-sm block w-full sm:text-sm rounded-md"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.title"
                            />
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-6 mt-4">
                    <InputLabel for="body" value="Body" />
                    <div class="mt-1">
                        <textarea
                            v-model="form.body"
                            id="body"
                            name="body"
                            rows="6"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"
                        ></textarea>
                    </div>
                    <InputError class="mt-2" :message="form.errors.details" />
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <Link
                        :href="route('announcement.index')"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Cancel
                    </Link>
                    <button
                        type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Post
                    </button>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
