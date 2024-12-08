<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->id();
            // Spoljni ključ za korisnike
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Spoljni ključ za kurseve sa eksplicitnim imenom tabele
            $table->foreignId('course_id')
                  ->constrained('kurs') // Ovde eksplicitno navodimo tabelu 'kurs'
                  ->onDelete('cascade');
            $table->timestamps(); // Praćenje vremena kreiranja i ažuriranja
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_user');
    }
};

