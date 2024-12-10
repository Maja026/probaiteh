<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursController;
use App\Http\Controllers\AuthController;

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

// Registracija i prijava korisnika
Route::post('register/korisnik', [AuthController::class, 'registerKorisnik']);
Route::post('login/korisnik', [AuthController::class, 'loginKorisnik']);

// Registracija i prijava profesora
Route::post('register/profesor', [AuthController::class, 'registerProfesor']);
Route::post('login/profesor', [AuthController::class, 'loginProfesor']);

// Logout
Route::post('logout', [AuthController::class, 'logout']);

// Handle errors in JSON format
Route::fallback(function () {
    return response()->json([
        'error' => 'Not Found'
    ], 404);
});

