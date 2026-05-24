<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Throwable;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try {
            if (! Schema::hasTable('company_settings')) {
                return;
            }
            config()->set('settings', \App\CompanySetting::all());
        } catch (Throwable) {
            // Skip when DB is unavailable (e.g. composer install, CI without DB).
        }
    }
}
