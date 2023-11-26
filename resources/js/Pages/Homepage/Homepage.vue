<script setup>
import Footer from "./partials/Footer.vue";
import Header from "./partials/Header.vue";
import Hero from "./partials/Hero.vue";
import HeroImage from "./partials/HeroImage.vue";
import BackgroundPattern from "./partials/BackgroundPattern.vue";
import ScholarshipCard from "../../Shared/ScholarshipCard.vue";
import { Head } from "@inertiajs/vue3";
import ModalMessagePrivateLink from "@/Components/ModalMessagePrivateLink.vue";
import Announcements from "./partials/Announcements.vue";

defineProps(["scholarships", "announcements"]);
</script>

<template>
    <Head title="Scholarships" />
    <ModalMessagePrivateLink />
    <div class="bg-gray-50">
        <div class="relative overflow-hidden">
            <BackgroundPattern />
            <div class="relative pt-6 pb-12">
                <div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6">
                        <Header />
                    </div>
                </div>
                <Hero />
            </div>
            <HeroImage />
        </div>

        <div class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <h2
                    class="font-montserrat mb-8 text-center text-gray-50 text-lg md:text-2xl lg:text-3xl font-semibold uppercase tracking-wide"
                >
                    Announcements
                </h2>
                <section>
                    <div
                        v-if="announcements.length === 0"
                        class="flex flex-col gap-8 items-center justify-center"
                    >
                        <img
                            class="h-60"
                            src="/images/empty-state/empty-scholarship.svg"
                        />
                        <h2 class="text-center text-white sm:text-xl uppercase">
                            No Available Announcement at the Moment
                        </h2>
                    </div>

                    <div
                        v-else
                        class="grid grid-cols-1 lg:grid-cols-3 gap-y-16 lg:gap-x-8"
                    >
                        <Announcements :announcements="announcements" />
                    </div>
                </section>
            </div>
        </div>

        <div class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <h2
                    class="font-montserrat mb-20 text-center text-gray-50 text-lg md:text-2xl lg:text-3xl font-semibold uppercase tracking-wide"
                >
                    Available Scholarships
                </h2>
                <!-- Scholarship card goes here -->
                <div
                    v-if="scholarships.length === 0"
                    class="flex flex-col gap-8 items-center justify-center mt-16"
                >
                    <img
                        class="h-60"
                        src="/images/empty-state/empty-scholarship.svg"
                    />
                    <h2 class="text-center text-white sm:text-xl uppercase">
                        No Available Scholarships at the Moment
                    </h2>
                </div>

                <div
                    v-else
                    class="grid grid-cols-1 lg:grid-cols-3 gap-y-16 lg:gap-x-8"
                >
                    <ScholarshipCard :scholarships="scholarships" />
                </div>
            </div>
        </div>
    </div>
    <Footer />
</template>
