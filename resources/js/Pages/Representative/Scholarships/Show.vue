<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { PaperClipIcon } from "@heroicons/vue/20/solid";
import { Head, Link } from "@inertiajs/vue3";
import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";

dayjs.extend(LocalizedFormat);
defineProps(["scholarship"]);
</script>
<template>
    <Head title="Scholarships" />

    <AuthenticatedLayout>
        <div>
            <header class="flex items-center justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">
                        {{ scholarship.scholarshipName }} Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">
                        Information and details about the scholarship.
                    </p>
                </div>
                <Link
                    :href="route('scholarship.index')"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Back
                </Link>
            </header>

            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Scholarship Name
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.scholarshipName }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Managed By
                            <span class="text-xs">(Representative Name)</span>
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.representative.name }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Status
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.status }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Slot
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.slot }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Deadline
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ dayjs(scholarship.deadlineAt).format("LL") }}
                        </dd>
                    </div>
                    <div
                        v-if="scholarship.applicationLink !== null"
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Application Link
                            <span class="text-xs">(if any)</span>
                        </dt>
                        <dd
                            class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                        >
                            <ul
                                role="list"
                                class="divide-y divide-gray-100 rounded-md border border-gray-200"
                            >
                                <li
                                    class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6"
                                >
                                    <div class="flex w-0 flex-1 items-center">
                                        <PaperClipIcon
                                            class="h-5 w-5 flex-shrink-0 text-gray-400"
                                            aria-hidden="true"
                                        />
                                        <div
                                            class="ml-4 flex min-w-0 flex-1 gap-2"
                                        >
                                            <span
                                                class="truncate font-medium"
                                                >{{
                                                    scholarship.applicationLink ??
                                                    "No Available Link"
                                                }}</span
                                            >
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a
                                            target="__blank"
                                            :href="scholarship.applicationLink"
                                            class="font-medium text-indigo-600 hover:text-indigo-500"
                                            >Go to link</a
                                        >
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Details
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.details }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
