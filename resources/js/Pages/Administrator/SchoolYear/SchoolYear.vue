<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import dayjs from "dayjs";

defineProps(["school_years"]);

const confirmingCreateScholarship = ref(false);

const confirmCreateScholarship = () => {
    confirmingCreateScholarship.value = true;
};

const closeModal = () => {
    confirmingCreateScholarship.value = false;
};

const form = useForm({
    start_school_year: "",
    end_school_year: "",
});
</script>
<template>
    <Head title="School Years" />

    <AuthenticatedLayout>
        <header
            class="px-5 border-b border-slate-100 flex justify-between items-center"
        >
            <h2 class="font-semibold text-lg text-slate-800">School Year</h2>
            <button
                @click="confirmCreateScholarship"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            >
                Create School Year
            </button>

            <Modal :show="confirmingCreateScholarship" @close="closeModal">
                <form
                    @submit.prevent="
                        form.post(route('school-year.store'), {
                            onSuccess: () => form.reset(),
                            onSuccess: () => closeModal(),
                        })
                    "
                >
                    <div class="p-6">
                        <h2 class="font-semibold">Create School Year</h2>
                        <div class="mt-6">
                            <InputLabel
                                for="start_school_year"
                                value="Start School Year"
                            />
                            <TextInput
                                id="start_school_year"
                                v-model="form.start_school_year"
                                type="date"
                                class="mt-1 block w-full"
                            />
                            <InputError
                                :message="form.errors.start_school_year"
                                class="mt-2"
                            />
                        </div>
                        <div class="mt-6">
                            <InputLabel
                                for="end_school_year"
                                value="End School Year"
                            />
                            <TextInput
                                id="end_school_year"
                                v-model="form.end_school_year"
                                type="date"
                                class="mt-1 block w-full"
                            />
                            <InputError
                                :message="form.errors.end_school_year"
                                class="mt-2"
                            />
                        </div>

                        <div class="mt-6 flex justify-end">
                            <SecondaryButton @click="closeModal">
                                Cancel
                            </SecondaryButton>
                            <button
                                type="submit"
                                class="ml-3 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </Modal>
        </header>

        <div
            v-if="school_years.length === 0"
            class="flex flex-col gap-8 items-center justify-center mt-16"
        >
            <img class="h-60" src="/images/empty-state/empty-school-year.svg" />
            <h2 class="text-center sm:text-xl uppercase">
                No Listed School Year at the Moment
            </h2>
        </div>

        <section class="mt-14" v-else>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div
                    v-for="school_year in school_years"
                    :key="school_year.id"
                    class="flex flex-col relative bg-white rounded-2xl shadow-xl"
                >
                    <div
                        class="absolute left-6 top-0 p-2 bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-white"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"
                            />
                        </svg>
                    </div>
                    <div class="flex-1 relative pt-8 px-6 pb-8 md:px-8">
                        <h3 class="text-xl mt-4 font-medium text-gray-900">
                            {{ dayjs(school_year.start_school_year).year() }} -
                            {{ dayjs(school_year.end_school_year).year() }}
                        </h3>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
