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
        Schema::create('wedding_hair_stylists', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم مصففة الشعر
            $table->json('work_images')->nullable(); // صور العمل
            $table->string('address')->nullable(); // العنوان
            $table->string('google_maps_url')->nullable(); // رابط خرائط جوجل
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->string('profile_url')->nullable(); // رابط صفحتها
            $table->string('package')->nullable(); // الباقة
            $table->string('venue')->nullable(); // مكان العرض
            $table->text('description')->nullable(); // وصف إضافي
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_hair_stylists');
    }
};
