<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wedding_photographers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // الاسم
            $table->string('specialty')->nullable(); // التخصص (فوتوغرافي، فيديو، كلاهما)
            $table->text('description')->nullable(); // وصف
            $table->json('phone_numbers')->nullable(); // أرقام الهواتف
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('website_url')->nullable(); // رابط الموقع
            $table->string('instagram_url')->nullable(); // رابط الانستغرام
            $table->string('facebook_url')->nullable(); // رابط الفيسبوك
            $table->json('portfolio_images')->nullable(); // صور الأعمال السابقة
            $table->json('portfolio_videos')->nullable(); // روابط فيديوهات الأعمال
            $table->decimal('price_range_min', 10, 2)->nullable(); // أقل سعر
            $table->decimal('price_range_max', 10, 2)->nullable(); // أعلى سعر
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wedding_photographers');
    }
};
