<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wedding_photographer_banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photographer_id')->nullable(); // مرتبط بمصور معين (اختياري)
            $table->string('title'); // عنوان اللافتة
            $table->string('banner_image'); // صورة اللافتة
            $table->string('link_url')->nullable(); // رابط عند الضغط
            $table->text('offer_description')->nullable(); // وصف العرض
            $table->date('valid_until')->nullable(); // صالح حتى تاريخ
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('photographer_id')->references('id')->on('wedding_photographers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wedding_photographer_banners');
    }
};
