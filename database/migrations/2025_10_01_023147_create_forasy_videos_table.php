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
        Schema::create('forasy_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->nullable()->constrained('forasy_jobs')->onDelete('cascade'); // معرف الوظيفة (اختياري)
            $table->string('title'); // عنوان الفيديو
            $table->string('video_url'); // رابط الفيديو
            $table->text('description')->nullable(); // وصف الفيديو
            $table->string('thumbnail')->nullable(); // صورة مصغرة
            $table->integer('skip_after_seconds')->default(5); // تخطي بعد ثواني
            $table->boolean('is_sponsored')->default(false); // فيديو دعائي
            $table->boolean('is_active')->default(true); // نشط
            $table->integer('display_order')->default(0); // ترتيب العرض
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forasy_videos');
    }
};
