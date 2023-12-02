<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import dayjs from "dayjs";
defineProps(["representatives"]);
</script>

<template>
    <Head title="Registered Representatives" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">
                Registered Representatives
            </h2>
        </header>

        <div
            v-if="representatives.length === 0"
            class="flex flex-col gap-8 items-center justify-center mt-16"
        >
            <img
                class="h-60"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center sm:text-xl uppercase">
                No Registered Representatives at the Moment
            </h2>
        </div>

        <div
            v-else
            class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg"
        >
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-indigo-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Representative Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No. of Created Scholarships
                        </th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">
                            Date of Account Registration
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="representative of representatives"
                        :key="representative.id"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ representative.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ representative.scholarships.length }}
                        </td>
                        <td class="px-6 py-4">
                            <a
                                class="text-indigo-600 underline"
                                :href="`mailto:${representative.email}`"
                            >
                                {{ representative.email }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{
                                dayjs(representative.created_at).format(
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
