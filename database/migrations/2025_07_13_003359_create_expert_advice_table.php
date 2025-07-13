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
        Schema::create('expert_advice', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('expert_name');
            $table->string('expert_specialization')->nullable();
            $table->enum('content_type', ['text', 'video', 'link'])->default('text');
            $table->longText('content');
            $table->enum('category', ['pregnancy', 'delivery', 'baby_care', 'breastfeeding', 'health', 'nutrition'])->default('pregnancy');
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
        Schema::dropIfExists('expert_advice');
    }
};
