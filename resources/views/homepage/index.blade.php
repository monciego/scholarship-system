<x-app-layout>
    <div class="bg-gray-50">
        <div class="relative overflow-hidden">
            @include('homepage.partials.pattern-bg')

            <div class="relative pt-6 pb-12">
                <div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6">
                        @include('homepage.partials.homepage-header')
                    </div>
                </div>

                @include('homepage.partials.homepage-hero')
            </div>

            @include('homepage.partials.homepage-hero-image')
        </div>
        <div class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <h2
                    class="font-montserrat text-center text-gray-50 text-lg md:text-2xl lg:text-3xl font-semibold uppercase tracking-wide">
                    Available Scholarships
                </h2>
                <!-- Scholarship card goes here -->
            </div>
        </div>
    </div>

    @include('homepage.partials.homepage-footer')
</x-app-layout>