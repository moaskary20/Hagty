<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flower_decorators', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم مورد الديكورات
            $table->string('specialty')->nullable(); // التخصص (زهور، ديكورات، تجهيزات)
            $table->json('phone_numbers')->nullable(); // أرقام الهواتف
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('address')->nullable(); // العنوان
            $table->text('description')->nullable(); // وصف الخدمات
            $table->json('portfolio_images')->nullable(); // صور المراجع
            $table->string('website_url')->nullable(); // رابط الموقع
            $table->string('instagram_url')->nullable(); // رابط الانستقرام
            $table->string('facebook_url')->nullable(); // رابط الفيسبوك
            $table->decimal('starting_price', 10, 2)->nullable(); // السعر المبدئي
            $table->json('services_offered')->nullable(); // الخدمات المقدمة
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flower_decorators');
    }
};
