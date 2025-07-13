<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wedding_venues', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الفندق/المكان
            $table->string('address'); // عنوان الموقع
            $table->integer('stars')->nullable(); // عدد النجوم
            $table->json('phone_numbers')->nullable(); // أرقام الهواتف
            $table->json('hall_images')->nullable(); // صور قاعات الحفلات
            $table->json('outdoor_images')->nullable(); // صور الأنشطة الخارجية
            $table->text('description')->nullable(); // وصف إضافي
            $table->string('google_maps_url')->nullable(); // رابط خرائط جوجل
            $table->string('website_url')->nullable(); // رابط الموقع
            $table->decimal('price_range_min', 10, 2)->nullable(); // أقل سعر
            $table->decimal('price_range_max', 10, 2)->nullable(); // أعلى سعر
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_venues');
    }
};
