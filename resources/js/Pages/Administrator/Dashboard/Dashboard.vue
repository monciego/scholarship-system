<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted, computed } from "vue";

defineProps([
    "scholarshipCount",
    "applicantsCount",
    "scholarsCount",
    "rejectScholarsCount",
    "representativeCount",
    "registeredUsersCount",
]);

const currentTime = ref(new Date());
const greetings = [
    "Have a wonderful day ahead!",
    "Rise and shine!",
    "Start your day with a smile!",
    "Hope you're having a productive day!",
    "Take a break and recharge!",
    "Stay focused and keep up the good work!",
    "Reflect on your accomplishments today!",
    "Relax and unwind after a busy day!",
    "Spend quality time with your loved ones!",
];

const timeOfDay = computed(() => {
    const hour = currentTime.value.getHours();
    if (hour < 12) {
        return "morning";
    } else if (hour < 18) {
        return "afternoon";
    } else {
        return "evening";
    }
});

const greeting = computed(() => {
    const greetingIndex =
        Math.floor(Math.random() * 3) +
        (timeOfDay.value === "morning"
            ? 0
            : timeOfDay.value === "afternoon"
            ? 3
            : 6);
    return greetings[greetingIndex];
});
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div>
            <div class="w-full">
                <div
                    class="bg-gradient-to-r from-indigo-600 to-blue-600 font-[sans-serif] p-6 verflow-hidden shadow-sm sm:rounded-lg"
                >
                    <h2 class="text-white sm:text-xl text-base font-bold">
                        <span v-if="timeOfDay === 'morning'">
                            Good Morning,
                        </span>
                        <span v-else-if="timeOfDay === 'afternoon'">
                            Good Afternoon,
                        </span>
                        <span v-else> Good Evening, </span>
                        {{ $page.props.auth.user.name }} !
                    </h2>
                    <p class="text-white">{{ greeting }}</p>
                </div>
            </div>
        </div>

        <div>
            <dl
                class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3"
            >
                <div
                    class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden"
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
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
                        <p
                            class="ml-16 text-sm font-medium text-gray-500 truncate"
                        >
                            Total of Scholarships
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ scholarshipCount }}
                        </p>
                        <div
                            class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6"
                        >
                            <div class="text-sm">
                                <Link
                                    :href="route('total-of-scholarships')"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                >
                                    View all<span class="sr-only">
                                        Scholarships</span
                                    ></Link
                                >
                            </div>
                        </div>
                    </dd>
                </div>

                <div
                    class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden"
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
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
                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"
                                />
                            </svg>
                        </div>
                        <p
                            class="ml-16 text-sm font-medium text-gray-500 truncate"
                        >
                            Total of Scholars
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ scholarsCount }}
                        </p>
                        <div
                            class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6"
                        >
                            <div class="text-sm">
                                <Link
                                    :href="route('total-of-scholars')"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                >
                                    View all<span class="sr-only">
                                        Scholars</span
                                    ></Link
                                >
                            </div>
                        </div>
                    </dd>
                </div>

                <div
                    class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden"
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
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
                                    d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"
                                />
                            </svg>
                        </div>
                        <p
                            class="ml-16 text-sm font-medium text-gray-500 truncate"
                        >
                            Total of Applicants
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ applicantsCount }}
                        </p>
                        <div
                            class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6"
                        >
                            <div class="text-sm">
                                <Link
                                    :href="route('total-of-applicants')"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                >
                                    View all<span class="sr-only">
                                        Applicants</span
                                    ></Link
                                >
                            </div>
                        </div>
                    </dd>
                </div>

                <div
                    class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden"
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
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
                                    d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"
                                />
                            </svg>
                        </div>
                        <p
                            class="ml-16 text-sm font-medium text-gray-500 truncate"
                        >
                            Total of Rejected Applicants
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ rejectScholarsCount }}
                        </p>
                        <div
                            class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6"
                        >
                            <div class="text-sm">
                                <Link
                                    :href="
                                        route('total-of-rejected-applicants')
                                    "
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                >
                                    View all<span class="sr-only">
                                        Rejected Applicants</span
                                    ></Link
                                >
                            </div>
                        </div>
                    </dd>
                </div>

                <div
                    class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden"
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
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
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                                />
                            </svg>
                        </div>
                        <p
                            class="ml-16 text-sm font-medium text-gray-500 truncate"
                        >
                            Total of Representatives
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ representativeCount }}
                        </p>
                        <div
                            class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6"
                        >
                            <div class="text-sm">
                                <Link
                                    :href="route('total-representatives')"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                >
                                    View all<span class="sr-only">
                                        Representatives</span
                                    ></Link
                                >
                            </div>
                        </div>
                    </dd>
                </div>

                <div
                    class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden"
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
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
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                                />
                            </svg>
                        </div>
                        <p
                            class="ml-16 text-sm font-medium text-gray-500 truncate"
                        >
                            Total of Registered Users
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ registeredUsersCount }}
                        </p>
                        <div
                            class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6"
                        >
                            <div class="text-sm">
                                <Link
                                    :href="route('registeredUsers')"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                >
                                    View all<span class="sr-only">
                                        Users</span
                                    ></Link
                                >
                            </div>
                        </div>
                    </dd>
                </div>
            </dl>
        </div>

        <!--  -->
    </AuthenticatedLayout>
</template>
