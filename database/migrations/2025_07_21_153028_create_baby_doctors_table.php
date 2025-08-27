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
        Schema::create('baby_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specialty')->nullable();
            $table->string('phone')->nullable();
            $table->string('clinic_name')->nullable();
            $table->string('clinic_address')->nullable();
            $table->unsignedBigInteger('baby_id')->nullable();
            $table->foreign('baby_id')->references('id')->on('babies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_doctors');
    }
};
