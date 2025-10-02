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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان الفعالية
            $table->text('description')->nullable(); // وصف الفعالية
            $table->string('event_type'); // نوع الفعالية (حفلة، مؤتمر، ورشة عمل، إلخ)
            $table->string('location')->nullable(); // الموقع
            $table->string('google_maps_url')->nullable(); // رابط خرائط جوجل
            $table->dateTime('event_date'); // تاريخ الفعالية
            $table->time('event_time')->nullable(); // وقت الفعالية
            $table->integer('duration_hours')->nullable(); // مدة الفعالية بالساعات
            $table->decimal('price', 10, 2)->nullable(); // السعر
            $table->integer('max_attendees')->nullable(); // الحد الأقصى للحضور
            $table->integer('current_attendees')->default(0); // عدد الحضور الحالي
            $table->string('organizer_name')->nullable(); // اسم المنظم
            $table->string('organizer_phone')->nullable(); // هاتف المنظم
            $table->string('organizer_email')->nullable(); // بريد المنظم
            $table->string('image')->nullable(); // صورة الفعالية
            $table->json('gallery_images')->nullable(); // معرض الصور
            $table->string('facebook_url')->nullable(); // رابط فيسبوك
            $table->string('instagram_url')->nullable(); // رابط انستجرام
            $table->string('website_url')->nullable(); // موقع الويب
            $table->boolean('is_featured')->default(false); // فعالية مميزة
            $table->boolean('is_active')->default(true); // نشط
            $table->text('terms_conditions')->nullable(); // الشروط والأحكام
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
