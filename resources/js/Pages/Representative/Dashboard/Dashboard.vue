<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted, computed } from "vue";

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
            <div class="w-full sm:px-6">
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
                        {{ $page.props.auth.user.name }}!
                    </h2>
                    <p class="text-white">{{ greeting }}</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
