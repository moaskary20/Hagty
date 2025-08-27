<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('be_the_chefs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['course', 'video'])->default('video');
            $table->text('description')->nullable();
            $table->string('video_url')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_online')->default(false);
            $table->json('tips')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('be_the_chefs');
    }
};
