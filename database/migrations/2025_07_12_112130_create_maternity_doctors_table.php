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
        Schema::create('maternity_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('specialty')->nullable();
            $table->string('clinic_name')->nullable();
            $table->text('clinic_address')->nullable();
            $table->json('phone_numbers')->nullable();
            $table->string('google_maps_url')->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->string('consultation_fees')->nullable();
            $table->json('working_hours')->nullable();
            $table->json('available_days')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
            $table->text('description')->nullable();
            $table->json('qualifications')->nullable();
            $table->json('languages_spoken')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maternity_doctors');
    }
};
