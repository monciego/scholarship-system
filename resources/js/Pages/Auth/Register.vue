<script setup>
import Header from "@/Shared/Auth/Header.vue";
import Footer from "@/Shared/Auth/Footer.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { computed, watch } from "vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    id_number: "",
    number_of_studying_siblings: "",
    monthly_income: "",
    address: "",
    year_level: "",
    birthday: "",
    have_existing_scholarship: {
        TDP: "TDP",
        TES: "TES",
        ACSP: "ACSP",
        DOLE: "DOLE",
        VIRGINIAN_SCHOLARSHIP: "VIRGINIAN_SCHOLARSHIP",
        SM_MEGAWORLD: "SM_MEGAWORLD",
        others: "",
    },
    othersInput: "",
    age: "",
});

const submit = () => {
    form.post(route("register"), {
        calculatedAge: calculatedAge.value,
        monthly_income: form.monthly_income,
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
const calculatedAge = computed(() => {
    if (form.birthday) {
        const today = new Date();
        const birthDate = new Date(form.birthday);
        let age = today.getFullYear() - birthDate.getFullYear();

        // Check if the birthday hasn't occurred yet this year
        if (
            today.getMonth() < birthDate.getMonth() ||
            (today.getMonth() === birthDate.getMonth() &&
                today.getDate() < birthDate.getDate())
        ) {
            age--;
        }
        // Update form.age
        form.age = age.toString();
        return age.toString();
    }

    return "";
});

watch(
    () => form.birthday,
    () => {
        calculatedAge.value; // This will trigger the reactivity
    }
);
</script>

<template>
    <Head title="Register" />
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-100"
    >
        <Header />
        <div class="sm:mx-auto px-6 sm:px-0 mt-28 sm:mt-10 w-full sm:max-w-3xl">
            <div
                class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 h-[22rem] overflow-y-scroll"
            >
                <h2 class="text-base font-semibold leading-7 text-gray-900">
                    Register
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Use a permanent email address where you can receive emails.
                </p>
                <form @submit.prevent="submit">
                    <div
                        class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6"
                    >
                        <div class="sm:col-span-3">
                            <InputLabel for="name" value="Name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.name"
                            />
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel for="email" value="University Email" />

                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autocomplete="username"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel for="id_number" value="ID Number" />

                            <TextInput
                                id="id_number"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.id_number"
                                required
                                autocomplete="id_number"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.id_number"
                            />
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel
                                for="number_of_studying_siblings"
                                value="Number of Studying Siblings"
                            />

                            <TextInput
                                id="number_of_studying_siblings"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.number_of_studying_siblings"
                                required
                                autocomplete="number_of_studying_siblings"
                            />

                            <InputError
                                class="mt-2"
                                :message="
                                    form.errors.number_of_studying_siblings
                                "
                            />
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel for="address" value="Address" />

                            <TextInput
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.address"
                                required
                                autocomplete="address"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.address"
                            />
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel for="year_level" value="Year Level" />

                            <TextInput
                                id="year_level"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.year_level"
                                required
                                autocomplete="year_level"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.year_level"
                            />
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel for="birthday" value="Birthday" />

                            <TextInput
                                id="birthday"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.birthday"
                                required
                                autocomplete="birthday"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.birthday"
                            />
                        </div>

                        <div class="sm:col-span-3">
                            <InputLabel for="age" value="Age" />

                            <TextInput
                                id="age"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.age"
                                required
                                autocomplete="age"
                                readonly
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.age"
                            />
                        </div>
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="monthly_income"
                            value="Monthly Income"
                        />
                        <select
                            class="border-gray-300 w-full mt-1 block focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="monthly_income"
                            id="monthly_income"
                            v-model="form.monthly_income"
                        >
                            <option selected value="9000">
                                9,100 or lower/month
                            </option>
                            <option value="9100">9,100 to 18,200/month</option>
                            <option value="18200">
                                18,200 to 36,400/ month
                            </option>
                            <option value="36400">
                                36,400 to 63,700/ month
                            </option>
                            <option value="63700">
                                63,700 to 109,200/month
                            </option>
                            <option value="109200">
                                109,200 to 182,000/ month
                            </option>
                            <option value="182000">Above 182,000/ month</option>
                        </select>

                        <InputError
                            class="mt-2"
                            :message="form.errors.monthly_income"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="have_existing_scholarship"
                            value="Have Existing Scholarship?"
                        />

                        <div class="mt-6 space-y-6">
                            <div
                                v-for="have_existing_scholarship in Object.keys(
                                    form.have_existing_scholarship
                                )"
                                :key="have_existing_scholarship"
                                class="relative"
                            >
                                <div class="flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input
                                            :id="have_existing_scholarship"
                                            :name="have_existing_scholarship"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                            v-model="
                                                form.have_existing_scholarship[
                                                    have_existing_scholarship
                                                ]
                                            "
                                        />
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label
                                            :for="have_existing_scholarship"
                                            class="font-medium text-gray-900 capitalize"
                                        >
                                            {{
                                                have_existing_scholarship.replace(
                                                    /_/g,
                                                    " "
                                                )
                                            }}
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <TextInput
                                        v-if="
                                            have_existing_scholarship ===
                                                'others' &&
                                            form.have_existing_scholarship
                                                .others
                                        "
                                        v-model="form.othersInput"
                                        type="text"
                                        :id="'othersInput'"
                                        :name="'have_existing_scholarship_others'"
                                        class="mt-4 w-full capitalize"
                                        placeholder="Specify others"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirm Password"
                        />

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link
                            :href="route('login')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Already registered?
                        </Link>

                        <PrimaryButton
                            class="ml-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Register
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
        <Footer />
    </div>
</template>
