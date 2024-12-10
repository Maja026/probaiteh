<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursController;

// Ruta za autentifikaciju korisnika
Route::get('/korisnik', function (Request $request) {
    return $request->user(); // I dalje koristi user() zbog Sanctum-a, ali naziv rute je "korisnik".
})->middleware('auth:sanctum');

// Rute za kurseve
Route::get('kursevi', [KursController::class, 'index']); // Javno dostupno
Route::get('kursevi/{id}', [KursController::class, 'show']); // Javno dostupno

Route::middleware('auth:sanctum')->group(function () {
    Route::post('kursevi', [KursController::class, 'store']); // Samo autentifikovani korisnici
    Route::put('kursevi/{id}', [KursController::class, 'update']); // Samo autentifikovani korisnici
    Route::delete('kursevi/{id}', [KursController::class, 'destroy']); // Samo autentifikovani korisnici
});
