<script setup>
import NavLink from "@/Components/NavLink.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <!-- sidebar -->
    <div
        class="hidden z-[100] md:flex md:w-64 md:flex-col md:fixed md:inset-y-0"
    >
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex-1 flex flex-col min-h-0 bg-gray-800">
            <Link :href="route('dashboard')">
                <div
                    class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900"
                >
                    <img
                        class="h-8 w-auto"
                        src="https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png"
                        alt="PSU Logo"
                    />
                    <span class="ml-4 text-white font-semibold">PSU</span>
                </div>
            </Link>

            <div class="flex-1 flex flex-col overflow-y-auto">
                <nav class="flex-1 px-2 py-4 space-y-2">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                    >
                        <svg
                            class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                        </svg>
                        Dashboard
                    </NavLink>
                    <NavLink
                        v-if="$page.props.role.admin"
                        :href="route('register.representative')"
                        :active="route().current('register.representative')"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                            />
                        </svg>
                        Register Representative
                    </NavLink>
                    <NavLink
                        v-if="$page.props.role.representative"
                        :href="route('scholarship.index')"
                        :active="route().current('scholarship.*')"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                            />
                        </svg>
                        Scholarships
                    </NavLink>
                    <NavLink
                        v-if="$page.props.role.representative"
                        :href="route('applicants.index')"
                        :active="route().current('applicants.*')"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                            />
                        </svg>
                        Applicants
                    </NavLink>
                </nav>
            </div>
        </div>
    </div>
</template>
