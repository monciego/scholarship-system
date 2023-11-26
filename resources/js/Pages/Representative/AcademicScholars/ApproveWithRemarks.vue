<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { computed, ref } from "vue";

defineProps(["scholar"]);

const approveForm = useForm({
    id: "",
    approve: true,
    remarks: "",
});

const confirmingApproval = ref(false);

const confirmApproveApplicant = () => {
    confirmingApproval.value = true;
};

const closeModal = () => {
    confirmingApproval.value = false;
};

const isRemarksNotEmpty = computed(() => approveForm.remarks.trim() !== "");
</script>

<template>
    <section class="space-y-6">
        <button
            @click="confirmApproveApplicant"
            class="px-3 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
        >
            Approve
        </button>

        <Modal :show="confirmingApproval" @close="closeModal">
            <form
                @submit.prevent="
                    approveForm
                        .transform((data) => ({
                            ...data,
                            name: scholar.first_name,
                            scholarshipName:
                                scholar.scholarship.scholarshipName,
                            email: scholar.email,
                            id: scholar.id,
                        }))
                        .post(route('approve-academic'))
                "
            >
                <div class="p-6">
                    <h2 class="text-base mb-4 font-medium text-gray-900">
                        Add Remarks
                    </h2>

                    <InputLabel for="body" value="Remarks" />
                    <div class="mt-1">
                        <textarea
                            v-model="approveForm.remarks"
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
                            v-model="approveForm.id"
                        />
                        <input
                            class="hidden"
                            v-model="approveForm.approve"
                            type="checkbox"
                            disabled="disabled"
                            name="approve"
                        />
                        <button
                            type="submit"
                            class="px-3 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-700 hover:bg-indigo-600 text-white"
                        >
                            <span
                                v-if="isRemarksNotEmpty"
                                class="xs:block text-xs"
                                >Submit and approve</span
                            >
                            <span v-else class="xs:block text-xs"
                                >Approve without remarks</span
                            >
                        </button>
                    </div>
                </div>
            </form>
        </Modal>
    </section>
</template>
