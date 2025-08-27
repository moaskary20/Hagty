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
        // إضافة حقول جديدة لجدول إعلانات البانر
        Schema::table('accessoraty_banner_ads', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->text('description')->nullable()->after('title');
            $table->string('location')->nullable()->after('link');
            $table->boolean('is_active')->default(true)->after('location');
        });

        // إضافة حقول جديدة لجدول إعلانات الفيديو
        Schema::table('accessoraty_sponsor_videos', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->text('description')->nullable()->after('title');
            $table->string('thumbnail')->nullable()->after('video_url');
            $table->string('duration')->nullable()->after('thumbnail');
            $table->boolean('is_active')->default(true)->after('skip_after_seconds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف الحقول من جدول إعلانات البانر
        Schema::table('accessoraty_banner_ads', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'location', 'is_active']);
        });

        // حذف الحقول من جدول إعلانات الفيديو
        Schema::table('accessoraty_sponsor_videos', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'thumbnail', 'duration', 'is_active']);
        });
    }
};
