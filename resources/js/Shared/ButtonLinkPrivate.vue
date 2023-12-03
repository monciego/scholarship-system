<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { toRefs } from "vue";
import { ref } from "vue";

const props = defineProps(["scholarship"]);
const { scholarship } = toRefs(props);
const scholarshipId = ref(scholarship.value.id);
const applicationLink = ref(scholarship.value.applicationLink);
const confirmingOpenModal = ref(false);

const user = usePage().props.auth.user;

const form = useForm({
    applicationLink: applicationLink.value,
    user_id: user ? user.id : null,
    scholarship_id: scholarshipId.value,
    student_id: "",
    degree: "",
    email: user ? user.email : "",
    first_name: "",
    middle_name: "",
    last_name: "",
});

const confirmScholarship = () => {
    confirmingOpenModal.value = true;
};

const submitForm = () => {
    form.post(route("private-scholarship-form.store"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingOpenModal.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <Link
            :href="route('login')"
            v-if="!user"
            class="inline-flex items-center px-6 py-2 sm:py-3 border border-transparent text-sm sm:text-base leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Apply Now
        </Link>

        <button
            v-else
            @click="confirmScholarship"
            class="inline-flex items-center px-6 py-2 sm:py-3 border border-transparent text-sm sm:text-base leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Apply Now
        </button>

        <Modal :show="confirmingOpenModal" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ scholarship.scholarshipName }} Application
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Please complete the pre-application form first before
                    following the link below to access the system and proceed
                    with your application. We look forward to receiving your
                    submission!
                </p>

                <button
                    class="mt-1 text-sm text-indigo-700 underline"
                    @click="submitForm"
                >
                    {{ scholarship.applicationLink }}
                </button>

                <div class="mt-6">
                    <InputLabel for="student_id" value="Student ID" />

                    <TextInput
                        id="student_id"
                        v-model="form.student_id"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.student_id"
                        class="mt-2"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="degree" value="Degree Program" />

                    <TextInput
                        id="degree"
                        v-model="form.degree"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.degree" class="mt-2" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.email" class="mt-2" />
                </div>

                <div class="mt-4">
                    <InputLabel for="first_name" value="First Name" />

                    <TextInput
                        id="first_name"
                        v-model="form.first_name"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.first_name"
                        class="mt-2"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="middle_name" value="Middle Name" />

                    <TextInput
                        id="middle_name"
                        v-model="form.middle_name"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.middle_name"
                        class="mt-2"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="last_name" value="Last Name" />

                    <TextInput
                        id="last_name"
                        v-model="form.last_name"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.last_name" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton
                        class="ml-3 bg-indigo-700 hover:bg-indigo-600"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="submitForm"
                    >
                        Submit
                    </PrimaryButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
