<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pediatric_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('specialty')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('clinic_name')->nullable();
            $table->decimal('consultation_fee', 10, 2)->nullable();
            $table->text('working_hours')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('years_of_experience')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pediatric_doctors');
    }
};
