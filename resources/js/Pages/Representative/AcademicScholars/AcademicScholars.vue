<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
defineProps(["scholars"]);
</script>

<template>
    <Head title="Scholars" />
    <AuthenticatedLayout>
        <header
            class="border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">
                Academmic Scholars
            </h2>
        </header>

        <div
            v-if="scholars.length === 0"
            class="flex flex-col gap-8 items-center justify-center mt-16"
        >
            <img
                class="h-60"
                src="/images/empty-state/empty-illustration.svg"
            />
            <h2 class="text-center sm:text-xl uppercase">
                No Scholars at the Moment
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
                        <th scope="col" class="px-6 py-3">Scholar's Name</th>
                        <th scope="col" class="px-6 py-3">Scholarship</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="scholar of scholars"
                        :key="scholar.id"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ scholar.student_id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ scholar.last_name }},
                            {{ scholar.first_name }}
                            {{ scholar.middle_name.charAt(0) }}.
                        </td>
                        <td class="px-6 py-4">
                            {{ scholar.scholarship.scholarshipName }}
                        </td>
                        <td class="px-6 py-4 truncate text-ellipsis">
                            <Link
                                :href="
                                    route('academic-scholars.show', {
                                        id: scholar.id,
                                    })
                                "
                                class="px-3 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                            >
                                <span class="xs:block text-xs"
                                    >More Details</span
                                >
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>