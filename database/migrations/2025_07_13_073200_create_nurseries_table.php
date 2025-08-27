<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nurseries', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الحضانة
            $table->text('address'); // العنوان
            $table->decimal('latitude', 10, 8)->nullable(); // خط العرض
            $table->decimal('longitude', 11, 8)->nullable(); // خط الطول
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('website')->nullable(); // رابط الموقع
            $table->decimal('rating', 2, 1)->default(0); // التقييم
            $table->string('age_range')->nullable(); // الفئة العمرية
            $table->decimal('fees', 8, 2)->nullable(); // الرسوم الشهرية
            $table->string('working_hours')->nullable(); // ساعات العمل
            $table->json('services')->nullable(); // الخدمات المقدمة
            $table->text('description')->nullable(); // الوصف
            $table->boolean('is_active')->default(true); // نشط
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nurseries');
    }
};
