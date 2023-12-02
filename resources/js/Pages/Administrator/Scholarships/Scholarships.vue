<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
defineProps(["scholarships"]);
</script>

<template>
    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">Scholarships</h2>
        </header>

        <div
            v-if="scholarships.length === 0"
            class="flex flex-col items-center justify-center mt-16"
        >
            <img
                class="h-60 mb-8"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center mb-4 sm:text-xl uppercase">
                No Available Scholarships at the Moment
            </h2>
        </div>

        <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-indigo-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Scholarship Name</th>
                        <th scope="col" class="px-6 py-3">Scholarship Type</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Created by</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(scholarship, index) in scholarships"
                        :key="index"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ scholarship.scholarshipName }}
                        </th>
                        <td class="px-6 py-4 capitalize">
                            {{ scholarship.scholarshipType }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ scholarship.status }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ scholarship.representative.name }}
                        </td>
                        <td class="px-6 flex gap-1 items-center py-4">
                            <Link
                                :href="
                                    route('total-of-scholarships.show', {
                                        id: scholarship.id,
                                    })
                                "
                                class="font-medium ml-4 text-indigo-600 hover:underline"
                            >
                                More
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
