<?php

namespace App\Providers;
use App\Models\PrivacyPolicy;
use App\Models\Disclaimer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\ModuleNamesComposer;

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
        //
        Paginator::useBootstrap();
        // View::composer('*', ModuleNamesComposer::class);
        Schema::defaultStringLength(191);
        view()->composer('footer', function ($view) {
            $privacyPolicy = PrivacyPolicy::latest()->first();
            $view->with('privacyPolicy', $privacyPolicy);
        });

        view()->composer('footer', function ($view) {
            $privacyPolicy = Disclaimer::latest()->first();
            $view->with('disclaimer', $privacyPolicy);
        });
    }
}
