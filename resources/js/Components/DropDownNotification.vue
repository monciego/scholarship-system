<script setup>
import Dropdown from "./Dropdown.vue";
import { Link } from "@inertiajs/vue3";
defineProps(["announcements"]);
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);
</script>

<template>
    <div class="ml-3 relative">
        <Dropdown align="right" width="25">
            <template #trigger>
                <span class="inline-flex rounded-md">
                    <button
                        type="button"
                        class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                            />
                        </svg>
                    </button>
                </span>
            </template>

            <template #content>
                <div class="p-4 w-[25rem]">
                    <h2 class="mb-2">Notifications</h2>

                    <div class="w-full">
                        <div
                            v-if="$page.props.announcements.length === 0"
                            class="flex flex-col gap-8 items-center justify-center mt-4"
                        >
                            <img
                                class="h-24"
                                src="/images/empty-state/empty-illustration.svg"
                            />
                            <h2 class="text-center uppercase">
                                No Notifications at the Moment
                            </h2>
                        </div>

                        <ul v-else class="my-1">
                            <li
                                class="flex"
                                v-for="announcement in $page.props
                                    .announcements"
                                :key="announcement.id"
                            >
                                <div
                                    class="grow flex items-center border-b border-gray-100 text-sm py-2"
                                >
                                    <div class="grow flex justify-between">
                                        <div class="self-center text-sm">
                                            📣

                                            {{ announcement.user.name }}
                                            published a new
                                            <Link
                                                :href="
                                                    route('showAnnouncement', {
                                                        id: announcement.id,
                                                    })
                                                "
                                                class="font-medium text-indigo-700 hover:text-indigo-900 hover:underline"
                                                >announcement
                                                <span
                                                    className="text-gray-600"
                                                    >{{
                                                        dayjs(
                                                            announcement.created_at
                                                        ).fromNow()
                                                    }}</span
                                                >
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </template>
        </Dropdown>
    </div>
</template>
