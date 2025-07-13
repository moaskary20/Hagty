<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dj_banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dj_performer_id')->nullable(); // مرتبط بمشغل دي جي معين (اختياري)
            $table->string('title'); // عنوان اللافتة
            $table->string('banner_image'); // صورة اللافتة
            $table->string('link_url')->nullable(); // رابط عند الضغط
            $table->text('offer_description')->nullable(); // وصف العرض
            $table->date('valid_until')->nullable(); // صالح حتى تاريخ
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('dj_performer_id')->references('id')->on('dj_performers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dj_banners');
    }
};
