<?php

namespace App\Providers;

use App\CompanySetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();

        View::composer('layouts.front', function (\Illuminate\View\View $view) {
            if ($view->offsetExists('content')) {
                return;
            }
            try {
                $content = Schema::hasTable('company_settings')
                    ? CompanySetting::first()
                    : null;
            } catch (\Throwable $e) {
                $content = null;
            }
            $view->with('content', $content);
        });
    }
}
