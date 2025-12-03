<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('children_hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('emergency_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->json('departments')->nullable();
            $table->integer('beds_count')->nullable();
            $table->boolean('has_emergency')->default(true);
            $table->boolean('has_icu')->default(false);
            $table->text('facilities')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->string('logo')->nullable();
            $table->json('images')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('children_hospitals');
    }
};
