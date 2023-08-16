<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteScholarship from "./DeleteScholarship.vue";
import { Head, Link } from "@inertiajs/vue3";
defineProps(["scholarships"]);
</script>
<template>
    <Head title="Scholarships" />

    <AuthenticatedLayout>
        <header
            class="px-5 border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">Scholarships</h2>
            <div>
                <Link
                    :href="route('scholarship.create')"
                    class="px-4 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                >
                    <span class="xs:block text-sm mr-2">Add Scholarship</span>
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

        <section class="mt-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div
                    v-for="scholarship in scholarships"
                    :key="scholarship.id"
                    class="flex flex-col bg-white rounded-2xl shadow-xl"
                >
                    <div class="flex-1 relative pt-8 px-6 pb-8 md:px-8">
                        <h3 class="text-xl font-medium text-gray-900">
                            {{ scholarship.scholarshipName }}
                        </h3>
                        <p
                            class="mt-4 mb-2 text-base text-gray-500 line-clamp-3"
                        >
                            {{ scholarship.details }}
                        </p>

                        <Link
                            :href="
                                route('scholarship.show', {
                                    id: scholarship.id,
                                })
                            "
                            class="text-base font-medium text-indigo-700 hover:text-indigo-600"
                        >
                            More Details <span aria-hidden="true"> &rarr;</span>
                        </Link>
                        <!--      <a
                            href=""
                            class="text-base font-medium text-indigo-700 hover:text-indigo-600"
                        >
                            More Details <span aria-hidden="true"> &rarr;</span>
                        </a> -->
                    </div>
                    <div
                        class="p-6 flex items-center gap-2 pt-0 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8"
                    >
                        <Link
                            :href="
                                route('scholarship.edit', {
                                    id: scholarship.id,
                                })
                            "
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Edit
                        </Link>
                        <DeleteScholarship :scholarship="scholarship" />
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
