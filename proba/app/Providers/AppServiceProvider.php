<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        // Handle not found route
    Route::fallback(function (Request $request) {
        return response()->json(['error' => 'Not Found'], 404);
    });

    // Handle Model Not Found exceptions
    app()->error(function (ModelNotFoundException $e) {
        return response()->json(['error' => 'Resource not found'], 404);
    });
    }
}
