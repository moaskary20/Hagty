<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('catering_banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catering_service_id')->nullable();
            $table->string('title'); // عنوان اللافتة
            $table->string('banner_image'); // صورة اللافتة
            $table->string('link_url')->nullable(); // رابط عند الضغط
            $table->text('offer_description')->nullable(); // وصف العرض
            $table->date('valid_until')->nullable(); // صالح حتى تاريخ
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->foreign('catering_service_id')->references('id')->on('catering_services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('catering_banners');
    }
};
