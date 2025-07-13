<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wedding_gift_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المورد
            $table->string('specialty')->nullable(); // التخصص (حرف يدوية، هدايا تذكارية، إلخ)
            $table->json('phone_numbers')->nullable(); // أرقام الهواتف
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('address')->nullable(); // العنوان
            $table->text('description')->nullable(); // وصف الخدمات والمنتجات
            $table->json('craft_specialties')->nullable(); // تخصصات الحرف اليدوية
            $table->json('portfolio_images')->nullable(); // صور معرض الأعمال
            $table->json('product_categories')->nullable(); // فئات المنتجات
            $table->string('website_url')->nullable(); // رابط الموقع
            $table->string('instagram_url')->nullable(); // رابط الانستقرام
            $table->string('facebook_url')->nullable(); // رابط الفيسبوك
            $table->string('whatsapp_number')->nullable(); // رقم الواتساب
            $table->decimal('min_order_price', 10, 2)->nullable(); // أقل سعر طلبية
            $table->integer('delivery_days')->nullable(); // أيام التسليم
            $table->boolean('custom_orders')->default(false); // يقبل طلبات مخصصة
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wedding_gift_suppliers');
    }
};
