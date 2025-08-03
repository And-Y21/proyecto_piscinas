<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\VerificaRol;
use Illuminate\Support\Facades\URL;

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
        Gate::define('admin', function ($user) {
            return $user->rol === 'Admin';
        });
        Gate::define('cliente', function ($user) {
            return $user->rol === 'Cliente';
        });
        Gate::define('instructor', function ($user) {
            return $user->rol === 'Instructor';
        });

        Gate::define('viewLogViewer', function ($user) {
            return $user->rol === 'Admin';
        });

        Route::aliasMiddleware('rol', VerificaRol::class);

        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
