<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursController;

// Rute za autentifikaciju
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rute za kurseve
Route::get('kursevi', [KursController::class, 'index']);
Route::get('kursevi/{id}', [KursController::class, 'show']);
Route::post('kursevi', [KursController::class, 'store']);
Route::put('kursevi/{id}', [KursController::class, 'update']);
Route::delete('kursevi/{id}', [KursController::class, 'destroy']);
