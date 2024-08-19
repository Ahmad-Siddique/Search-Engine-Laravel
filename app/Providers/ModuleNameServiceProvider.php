<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ModuleName;
class ModuleNameServiceProvider extends ServiceProvider
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
        $moduleNames = ModuleName::firstOrCreate([], [
            'material' => 'material',
            'resource' => 'resource',
            'service' => 'service',
            'equipment' => 'equipment',
            'reference' => 'reference',
            'gallery' => 'gallery',
        ]);

        $this->app->singleton('moduleNames', function () use ($moduleNames) {
            return $moduleNames;
        });

    }
}
