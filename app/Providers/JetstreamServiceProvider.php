<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\ServiceProvider;
use App\Models\Buku;
use App\Policies\BukuPolicy;

class JetstreamServiceProvider extends ServiceProvider
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
        $this->configurePermissions();

        Jetstream::useUserModel(config('auth.providers.users.model'));

        Gate::policy(Buku::class, BukuPolicy::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Gate::define('create', function ($user, $model) {
            return true; // Customize the logic based on your requirements
        });

        Gate::define('update', function ($user, $model) {
            return true; // Customize the logic based on your requirements
        });

        Gate::define('delete', function ($user, $model) {
            return true; // Customize the logic based on your requirements
        });

        // Define more permissions based on your requirements
    }
}
