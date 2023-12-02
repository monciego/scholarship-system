<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import dayjs from "dayjs";
defineProps(["registeredUsers"]);
</script>

<template>
    <Head title="Registered Users" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">
                Registered Users
            </h2>
        </header>

        <div
            v-if="registeredUsers.length === 0"
            class="flex flex-col gap-8 items-center justify-center mt-16"
        >
            <img
                class="h-60"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center sm:text-xl uppercase">
                No Registered Users at the Moment
            </h2>
        </div>

        <div
            v-else
            class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg"
        >
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-indigo-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Student ID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">
                            Date of Account Registration
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="registeredUser of registeredUsers"
                        :key="registeredUser.id"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ registeredUser.id_number }}
                        </th>
                        <td class="px-6 py-4">
                            {{ registeredUser.name }}
                        </td>
                        <td class="px-6 py-4">
                            <a
                                class="text-indigo-600 underline"
                                :href="`mailto:${registeredUser.email}`"
                            >
                                {{ registeredUser.email }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{
                                dayjs(registeredUser.created_at).format(
                                    "MMM D, YYYY"
                                )
                            }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
