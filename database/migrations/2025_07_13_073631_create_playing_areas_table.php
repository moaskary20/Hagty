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
        Schema::create('playing_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم منطقة اللعب
            $table->text('address'); // العنوان
            $table->decimal('latitude', 10, 8)->nullable(); // خط العرض
            $table->decimal('longitude', 11, 8)->nullable(); // خط الطول
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->string('website')->nullable(); // رابط الموقع
            $table->decimal('fees', 8, 2)->nullable(); // الرسوم
            $table->time('opening_hours')->nullable(); // ساعة الافتتاح
            $table->time('closing_hours')->nullable(); // ساعة الإغلاق
            $table->string('age_range')->nullable(); // الفئة العمرية
            $table->json('facilities')->nullable(); // المرافق
            $table->text('description')->nullable(); // الوصف
            $table->decimal('rating', 2, 1)->default(0); // التقييم
            $table->boolean('is_active')->default(true); // نشط
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playing_areas');
    }
};
