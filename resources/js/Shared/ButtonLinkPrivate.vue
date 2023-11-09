<script setup>
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";

defineProps(["scholarship"]);

const confirmingApplyPrivateModal = ref(false);

const confirmDeleteScholarship = () => {
    confirmingApplyPrivateModal.value = true;
};

const closeModal = () => {
    confirmingApplyPrivateModal.value = false;
};
</script>

<template>
    <section class="space-y-6">
        <button
            @click="confirmDeleteScholarship"
            class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Apply Now
        </button>

        <Modal :show="confirmingApplyPrivateModal" @close="closeModal">
            <div class="p-6">
                <p class="mt-1 text-sm text-gray-900">
                    Kindly follow this link to access their system and proceed
                    with your application.
                </p>
                <a
                    class="text-sm my-3 underline text-indigo-700"
                    :href="scholarship.applicationLink"
                    target="__blank"
                    >{{ scholarship.applicationLink }}
                </a>

                <div class="mt-6 gap-2 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <a
                        :href="scholarship.applicationLink"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        target="__blank"
                    >
                        Go to Link
                    </a>
                </div>
            </div>
        </Modal>
    </section>
</template>
