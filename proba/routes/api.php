<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursController;

// Ruta za autentifikaciju korisnika
Route::get('/korisnik', function (Request $request) {
    return response()->json($request->user());
})->middleware('auth:sanctum');

// Rute za kurseve sa middlewarem
Route::middleware('auth:sanctum')->group(function () {
    Route::get('kursevi', [KursController::class, 'index'])->name('kursevi.index');
    Route::get('kursevi/{id}', [KursController::class, 'show'])->name('kursevi.show');
    Route::post('kursevi', [KursController::class, 'store'])->name('kursevi.store');
    Route::put('kursevi/{id}', [KursController::class, 'update'])->name('kursevi.update');
    Route::delete('kursevi/{id}', [KursController::class, 'destroy'])->name('kursevi.destroy');
});

// Handle errors in JSON format
Route::fallback(function () {
    return response()->json([
        'error' => 'Not Found'
    ], 404);
});
