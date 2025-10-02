<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('coaching_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('coach_name');
            $table->string('session_type');
            $table->string('audio_url')->nullable();
            $table->integer('duration_minutes')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('motivational_content', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('content_type');
            $table->string('author')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('self_development_skills', function (Blueprint $table) {
            $table->id();
            $table->string('skill_name');
            $table->text('description');
            $table->string('category');
            $table->text('steps')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('story');
            $table->string('person_name')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('post_type');
            $table->integer('likes_count')->default(0);
            $table->boolean('is_approved')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('mostamay_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner_image');
            $table->string('link_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('mostamay_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('mostamay_videos');
        Schema::dropIfExists('mostamay_banners');
        Schema::dropIfExists('community_posts');
        Schema::dropIfExists('success_stories');
        Schema::dropIfExists('self_development_skills');
        Schema::dropIfExists('motivational_content');
        Schema::dropIfExists('coaching_sessions');
    }
};
