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
        Schema::create('podcast_episodes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('episode_number')->nullable();
            $table->integer('season_number')->default(1);
            $table->string('host_name')->nullable();
            $table->string('guest_name')->nullable();
            $table->text('guest_bio')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->integer('duration')->nullable(); // in minutes
            $table->enum('category', ['pregnancy_tips', 'baby_care', 'motherhood', 'health', 'nutrition'])->default('pregnancy_tips');
            $table->json('tags')->nullable();
            $table->longText('transcript')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->integer('downloads_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('podcast_episodes');
    }
};
