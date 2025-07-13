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
        Schema::create('wedding_venue_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_venue_id')->nullable(); // مرتبط بفندق معين (اختياري)
            $table->string('title'); // عنوان الفيديو
            $table->string('video_url'); // رابط الفيديو
            $table->text('description')->nullable(); // وصف الفيديو
            $table->integer('skip_after_seconds')->default(5); // وقت التخطي
            $table->boolean('is_sponsored')->default(true); // إعلان برعاية
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('wedding_venue_id')->references('id')->on('wedding_venues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_venue_videos');
    }
};
