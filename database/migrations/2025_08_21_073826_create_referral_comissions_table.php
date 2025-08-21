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
        Schema::create('referral_comissions', function (Blueprint $table) {
            $table->id();
            $table->integer('referral_user_id');
            $table->integer('referred_by_user_id');
            $table->decimal('amount', 18, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referral_comissions');
    }
};
