<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('komentars', function (Blueprint $table) {
        $table->foreignId('kurs_id')->constrained('kurs')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('komentars', function (Blueprint $table) {
        $table->dropForeign(['kurs_id']);
        $table->dropColumn('kurs_id');
    });
}
};
