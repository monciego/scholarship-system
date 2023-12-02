<script setup>
import { Link } from "@inertiajs/vue3";
defineProps(["announcements"]);
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);
</script>

<template>
    <div
        class="col-span-full relative h-[19rem] overflow-y-scroll xl:col-span-6 bg-white shadow-lg rounded-sm border border-gray-200"
    >
        <header
            class="px-5 sticky top-0 bg-white left-0 py-4 border-b border-gray-100"
        >
            <h2 class="font-semibold text-gray-800">Announcements</h2>
        </header>
        <div class="p-3">
            <div
                v-if="announcements.length === 0"
                class="flex flex-col gap-8 items-center justify-center mt-4"
            >
                <img
                    class="h-24"
                    src="/images/empty-state/empty-illustration.svg"
                />
                <h2 class="text-center uppercase">
                    No Announcements at the Moment
                </h2>
            </div>

            <div v-else>
                <ul class="my-1">
                    <!-- Item -->
                    <li
                        class="flex px-2"
                        v-for="announcement in announcements"
                        :key="announcement.id"
                    >
                        <div
                            class="w-9 h-9 rounded-full shrink-0 bg-emerald-500 my-2 mr-3"
                        >
                            <svg
                                class="w-9 h-9 fill-current text-indigo-50"
                                viewBox="0 0 36 36"
                            >
                                <path
                                    d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"
                                />
                            </svg>
                        </div>
                        <div
                            class="grow flex items-center border-b border-gray-100 text-sm py-2"
                        >
                            <div class="grow flex justify-between">
                                <div class="self-center">
                                    {{ announcement.user.name }} published a new
                                    <Link
                                        :href="
                                            route('showAnnouncement', {
                                                id: announcement.id,
                                            })
                                        "
                                        class="font-medium text-indigo-700 hover:text-indigo-900 hover:underline"
                                        >announcement
                                        <span className="text-gray-600">{{
                                            dayjs(
                                                announcement.created_at
                                            ).fromNow()
                                        }}</span>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
