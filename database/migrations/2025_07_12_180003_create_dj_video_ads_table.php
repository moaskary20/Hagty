<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dj_video_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dj_performer_id')->nullable(); // مرتبط بمشغل دي جي معين (اختياري)
            $table->string('title'); // عنوان الفيديو
            $table->string('video_url'); // رابط الفيديو
            $table->text('description')->nullable(); // وصف الفيديو
            $table->integer('skip_after_seconds')->default(5); // وقت التخطي
            $table->boolean('is_sponsored')->default(true); // إعلان برعاية
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('dj_performer_id')->references('id')->on('dj_performers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dj_video_ads');
    }
};
