<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import dayjs from "dayjs";
import DeleteAnnouncement from "./DeleteAnnouncement.vue";
defineProps(["announcements"]);
</script>
<template>
    <Head title="Announcements" />

    <AuthenticatedLayout>
        <header
            class="px-5 border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">Announcements</h2>
            <div>
                <Link
                    :href="route('announcement.create')"
                    class="px-2 sm:px-4 py-2 font-medium text-xs sm:text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                >
                    <span class="xs:block text-sm mr-2">Add Announcement</span>
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
                            d="M12 6v12m6-6H6"
                        />
                    </svg>
                </Link>
            </div>
        </header>

        <div
            v-if="announcements.length === 0"
            class="flex flex-col gap-8 items-center justify-center mt-16"
        >
            <img
                class="h-60"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center sm:text-xl uppercase">
                No Announcements at the Moment
            </h2>
        </div>

        <section class="mt-8" v-else>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div
                    v-for="announcement in announcements"
                    :key="announcement.id"
                    class="flex flex-col relative bg-white rounded-2xl shadow-xl"
                >
                    <div class="flex-1 relative pt-8 px-6 pb-8 md:px-8">
                        <h3 class="text-xl font-medium text-gray-900">
                            {{ announcement.title }}
                        </h3>

                        <Link
                            :href="
                                route('announcement.show', {
                                    id: announcement.id,
                                })
                            "
                            class="text-base font-medium block pt-4 text-indigo-700 hover:text-indigo-600"
                        >
                            More Details <span aria-hidden="true"> &rarr;</span>
                        </Link>
                    </div>
                    <div
                        class="p-6 flex items-center gap-2 pt-0 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8"
                    >
                        <Link
                            :href="
                                route('announcement.edit', {
                                    id: announcement.id,
                                })
                            "
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Edit
                        </Link>
                        <DeleteAnnouncement :announcement="announcement" />
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
