<?php

namespace App\Providers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('announcements')) {
            $announcements = Announcement::all();
            Inertia::share('announcements', $announcements);
        }
    }
}
