<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routing for the application.
     */
    public function boot(): void
    {
        // Define la limitación de tasas (Rate limiting) si es necesaria
        $this->configureRateLimiting();

        $this->routes(function () {

            // Carga las rutas API
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Carga las rutas Web (las que ya están funcionando)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
