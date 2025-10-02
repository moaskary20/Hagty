<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('riadaty_workouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('workout_type');
            $table->integer('duration_minutes');
            $table->string('difficulty_level');
            $table->integer('calories_burned')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('riadaty_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->text('description');
            $table->string('plan_type');
            $table->integer('duration_weeks');
            $table->text('schedule_details')->nullable();
            $table->string('difficulty_level');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('riadaty_nutrition', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('riadaty_exercise_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->text('description')->nullable();
            $table->string('exercise_type');
            $table->integer('duration_minutes')->nullable();
            $table->string('difficulty_level');
            $table->string('thumbnail')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('riadaty_challenges', function (Blueprint $table) {
            $table->id();
            $table->string('challenge_name');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('challenge_type');
            $table->integer('participants_count')->default(0);
            $table->text('prizes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('riadaty_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner_image');
            $table->string('link_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('riadaty_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('riadaty_videos');
        Schema::dropIfExists('riadaty_banners');
        Schema::dropIfExists('riadaty_challenges');
        Schema::dropIfExists('riadaty_exercise_videos');
        Schema::dropIfExists('riadaty_nutrition');
        Schema::dropIfExists('riadaty_plans');
        Schema::dropIfExists('riadaty_workouts');
    }
};

