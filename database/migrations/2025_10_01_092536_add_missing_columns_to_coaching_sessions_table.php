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
        Schema::table('coaching_sessions', function (Blueprint $table) {
            // تغيير اسم العمود من title إلى session_title
            $table->renameColumn('title', 'session_title');
            
            // إضافة عمود topic
            $table->string('topic')->nullable()->after('description');
            
            // إضافة عمود session_date
            $table->dateTime('session_date')->nullable()->after('coach_name');
            
            // إضافة عمود duration_minutes إن لم يكن موجوداً
            // هذا العمود موجود بالفعل لكن سنتأكد
        });
        
        // تحديث جدول self_development_skills
        Schema::table('self_development_skills', function (Blueprint $table) {
            $table->string('difficulty_level')->nullable()->after('category');
            $table->text('key_points')->nullable()->after('difficulty_level');
        });
        
        // تحديث جدول success_stories
        Schema::table('success_stories', function (Blueprint $table) {
            $table->string('achievement')->nullable()->after('person_name');
            $table->text('lessons_learned')->nullable()->after('story');
        });
        
        // تحديث جدول community_posts
        Schema::table('community_posts', function (Blueprint $table) {
            $table->string('author_name')->nullable()->after('user_id');
            $table->integer('comments_count')->default(0)->after('likes_count');
            $table->string('image')->nullable()->after('post_type');
            $table->boolean('is_pinned')->default(false)->after('is_approved');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coaching_sessions', function (Blueprint $table) {
            $table->renameColumn('session_title', 'title');
            $table->dropColumn(['topic', 'session_date']);
        });
        
        Schema::table('self_development_skills', function (Blueprint $table) {
            $table->dropColumn(['difficulty_level', 'key_points']);
        });
        
        Schema::table('success_stories', function (Blueprint $table) {
            $table->dropColumn(['achievement', 'lessons_learned']);
        });
        
        Schema::table('community_posts', function (Blueprint $table) {
            $table->dropColumn(['author_name', 'comments_count', 'image', 'is_pinned']);
        });
    }
};
