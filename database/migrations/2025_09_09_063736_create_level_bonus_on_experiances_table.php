<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('level_bonus_on_experiances', function (Blueprint $table) {
            $table->id();
            $table->integer('experiance')->nullable();
            $table->integer('level')->nullable();
            $table->integer('token_bonus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_bonus_on_experiances');
    }
};
