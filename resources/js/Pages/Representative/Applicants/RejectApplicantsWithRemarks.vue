<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { computed, ref } from "vue";

defineProps(["applicant"]);

const rejectForm = useForm({
    id: "",
    reject: true,
    remarks: "",
});

const confirmingRejection = ref(false);

const confirmRejectApplicant = () => {
    confirmingRejection.value = true;
};

const closeModal = () => {
    confirmingRejection.value = false;
};

const isRemarksNotEmpty = computed(() => rejectForm.remarks.trim() !== "");
</script>

<template>
    <section class="space-y-6">
        <button
            @click="confirmRejectApplicant"
            class="px-3 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-red-700 hover:bg-red-600 text-white"
        >
            Reject
        </button>

        <Modal :show="confirmingRejection" @close="closeModal">
            <form
                @submit.prevent="
                    rejectForm
                        .transform((data) => ({
                            ...data,
                            name: applicant.first_name,
                            scholarshipName:
                                applicant.scholarship.scholarshipName,
                            email: applicant.email,
                            id: applicant.id,
                        }))
                        .post(route('reject-applicant'))
                "
            >
                <div class="p-6">
                    <h2 class="text-base mb-4 font-medium text-gray-900">
                        Add Remarks
                    </h2>

                    <InputLabel for="body" value="Remarks" />
                    <div class="mt-1">
                        <textarea
                            v-model="rejectForm.remarks"
                            id="body"
                            name="body"
                            rows="4"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"
                        ></textarea>
                    </div>

                    <div class="mt-6 gap-2 flex justify-end">
                        <SecondaryButton @click="closeModal">
                            Cancel
                        </SecondaryButton>

                        <input
                            type="hidden"
                            name="id"
                            v-model="rejectForm.id"
                        />
                        <input
                            class="hidden"
                            v-model="rejectForm.reject"
                            type="checkbox"
                            disabled="disabled"
                            name="reject"
                        />
                        <button
                            type="submit"
                            class="px-3 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                        >
                            <span
                                v-if="isRemarksNotEmpty"
                                class="xs:block text-xs"
                                >Submit and reject</span
                            >
                            <span v-else class="xs:block text-xs"
                                >Reject without remarks</span
                            >
                        </button>
                    </div>
                </div>
            </form>
        </Modal>
    </section>
</template>
