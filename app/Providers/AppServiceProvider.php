<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
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
        // Limit the batch by 50 requests per hour
        RateLimiter::for('batch', function (Request $request) {
            return Limit::perHour(50)->by($request->user()?->id ?: $request->ip());
        });

        // Limit the individual by 3600 requests per hour
        RateLimiter::for('individual', function (Request $request) {
            return Limit::perHour(3600)->by($request->user()?->id ?: $request->ip());
        });
    }
}
