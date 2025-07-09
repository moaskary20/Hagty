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
        Schema::create('health_tips', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان النصيحة
            $table->text('description')->nullable(); // وصف مختصر
            $table->enum('type', ['doctor_sponsored', 'generic'])->default('generic'); // نوع النصيحة
            $table->enum('content_type', ['text', 'video', 'youtube_link'])->default('text'); // نوع المحتوى
            $table->longText('content'); // المحتوى (نص أو رابط فيديو أو يوتيوب)
            $table->string('youtube_video_id')->nullable(); // معرف فيديو اليوتيوب
            $table->string('image')->nullable(); // صورة مصغرة
            $table->unsignedBigInteger('doctor_id')->nullable(); // الطبيب المرتبط (إذا كان doctor_sponsored)
            $table->boolean('is_active')->default(true); // حالة النصيحة
            $table->integer('views_count')->default(0); // عدد المشاهدات
            $table->timestamps();
            
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_tips');
    }
};
