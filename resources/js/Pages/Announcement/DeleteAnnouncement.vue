<script setup>
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps(["announcement"]);

const confirmingAnnouncementDeletion = ref(false);

const confirmDeleteAnnouncement = () => {
    confirmingAnnouncementDeletion.value = true;
};

const closeModal = () => {
    confirmingAnnouncementDeletion.value = false;
};
</script>

<template>
    <section class="space-y-6">
        <button
            @click="confirmDeleteAnnouncement"
            class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
        >
            Delete
        </button>

        <Modal :show="confirmingAnnouncementDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete
                    {{ announcement.title }} ?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once your account is deleted, all of its resources and data
                    will be permanently deleted.
                </p>

                <div class="mt-6 gap-2 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <Link
                        :href="route('announcement.destroy', announcement.id)"
                        as="button"
                        method="delete"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-4 font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    >
                        Delete
                    </Link>
                </div>
            </div>
        </Modal>
    </section>
</template>
