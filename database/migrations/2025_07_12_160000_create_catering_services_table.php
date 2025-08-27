<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('catering_services', function (Blueprint $table) {
            $table->id();
            $table->string('company_name'); // اسم شركة خدمات الطعام
            $table->string('contact_person')->nullable(); // الشخص المسؤول
            $table->string('address')->nullable(); // العنوان
            $table->json('phone_numbers')->nullable(); // أرقام الهواتف
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('website_url')->nullable(); // رابط الموقع
            $table->string('facebook_url')->nullable(); // رابط الفيسبوك
            $table->string('instagram_url')->nullable(); // رابط الإنستغرام
            $table->json('service_images')->nullable(); // صور الخدمة
            $table->text('description')->nullable(); // وصف الشركة
            $table->json('specialties')->nullable(); // التخصصات (مأكولات شرقية، غربية، إلخ)
            $table->decimal('min_order_value', 10, 2)->nullable(); // أقل قيمة طلب
            $table->integer('min_guests')->nullable(); // أقل عدد ضيوف
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catering_services');
    }
};
