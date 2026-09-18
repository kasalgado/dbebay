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
        Schema::table('users', function (Blueprint $table) {
            $table->string('plz')->nullable();
            $table->string('ort')->nullable();
            $table->string('strasse')->nullable();
            $table->string('hausnummer')->nullable();
            $table->string('telefonnummer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'plz',
                'ort',
                'strasse',
                'hausnummer',
                'telefonnummer',
            ]);
        });
    }
};
