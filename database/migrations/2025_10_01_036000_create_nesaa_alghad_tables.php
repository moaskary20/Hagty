<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('educational_programs', function (Blueprint $table) {
            $table->id();
            $table->string('program_name');
            $table->text('description');
            $table->string('category');
            $table->integer('duration_hours')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('instructor')->nullable();
            $table->string('level');
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('women_success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('story');
            $table->string('woman_name');
            $table->string('achievement');
            $table->string('field')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('leadership_skills', function (Blueprint $table) {
            $table->id();
            $table->string('skill_name');
            $table->text('description');
            $table->string('category');
            $table->text('learning_points')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('women_initiatives', function (Blueprint $table) {
            $table->id();
            $table->string('initiative_name');
            $table->text('description');
            $table->string('organizer');
            $table->string('initiative_type');
            $table->string('contact_email')->nullable();
            $table->string('website_url')->nullable();
            $table->integer('members_count')->default(0);
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('empowerment_resources', function (Blueprint $table) {
            $table->id();
            $table->string('resource_name');
            $table->text('description');
            $table->string('resource_type');
            $table->string('category');
            $table->string('resource_url')->nullable();
            $table->boolean('is_free')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('nesaa_alghad_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner_image');
            $table->string('link_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('nesaa_alghad_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('nesaa_alghad_videos');
        Schema::dropIfExists('nesaa_alghad_banners');
        Schema::dropIfExists('empowerment_resources');
        Schema::dropIfExists('women_initiatives');
        Schema::dropIfExists('leadership_skills');
        Schema::dropIfExists('women_success_stories');
        Schema::dropIfExists('educational_programs');
    }
};
