<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flower_sponsor_banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flower_decorator_id')->nullable(); // مرتبط بمورد معين (اختياري)
            $table->string('title'); // عنوان اللافتة
            $table->string('banner_image'); // صورة اللافتة
            $table->string('sponsor_company')->nullable(); // الشركة الراعية
            $table->string('link_url')->nullable(); // رابط عند الضغط
            $table->text('offer_description')->nullable(); // وصف العرض
            $table->date('valid_until')->nullable(); // صالح حتى تاريخ
            $table->boolean('is_sponsored')->default(true); // لافتة برعاية
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('flower_decorator_id')->references('id')->on('flower_decorators')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('flower_sponsor_banners');
    }
};
