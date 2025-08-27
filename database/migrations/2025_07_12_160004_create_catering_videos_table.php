<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('catering_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catering_service_id')->nullable();
            $table->string('title'); // عنوان الفيديو
            $table->string('video_url'); // رابط الفيديو
            $table->text('description')->nullable(); // وصف الفيديو
            $table->integer('skip_after_seconds')->default(5); // وقت التخطي
            $table->boolean('is_sponsored')->default(true); // إعلان برعاية
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->foreign('catering_service_id')->references('id')->on('catering_services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('catering_videos');
    }
};
