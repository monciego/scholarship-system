<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const isMorning = ref(false);
const isAfternoon = ref(false);

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

const greeting = ref("");

let greetingIndex;

onMounted(() => {
    const today = new Date();
    const hour = today.getHours();

    if (hour < 12) {
        greetingIndex = Math.floor(Math.random() * 3);
        isMorning.value = true;
    } else if (hour < 18) {
        greetingIndex = Math.floor(Math.random() * 3) + 3;
        isAfternoon.value = true;
    } else {
        greetingIndex = Math.floor(Math.random() * 3) + 6;
    }
    greeting.value = greetings[greetingIndex];
});
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div>
            <div class="w-full sm:px-6">
                <div
                    class="bg-gradient-to-r from-indigo-600 to-blue-600 font-[sans-serif] p-6 verflow-hidden shadow-sm sm:rounded-lg"
                >
                    <h2 class="text-white sm:text-xl text-base font-bold">
                        <span v-if="isMorning"> Good Morning, </span>
                        <span v-if="isAfternoon"> Good Afternoon, </span>
                        <span v-else> Good Evening, </span>
                        {{ $page.props.auth.user.name }} !
                    </h2>
                    <p class="text-white">{{ greeting }}</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
