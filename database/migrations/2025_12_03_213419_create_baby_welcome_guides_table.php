<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('baby_welcome_guides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('category')->nullable();
            $table->string('baby_age')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('checklist')->nullable();
            $table->json('tips')->nullable();
            $table->integer('views_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('baby_welcome_guides');
    }
};
