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
        Schema::create('grandma_advice', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('grandma_name');
            $table->integer('grandma_age')->nullable();
            $table->string('grandma_image')->nullable();
            $table->longText('advice_text');
            $table->enum('advice_type', ['text', 'audio', 'video'])->default('text');
            $table->string('media_url')->nullable();
            $table->integer('duration')->nullable(); // in minutes
            $table->enum('category', ['pregnancy', 'delivery', 'baby_care', 'breastfeeding', 'family'])->default('pregnancy');
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->integer('likes_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grandma_advice');
    }
};
