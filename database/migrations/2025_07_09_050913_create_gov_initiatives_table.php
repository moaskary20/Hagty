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
        Schema::create('gov_initiatives', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان المبادرة
            $table->text('description'); // وصف المبادرة
            $table->enum('content_type', ['video', 'infographic', 'both'])->default('video'); // نوع المحتوى
            $table->string('video_url')->nullable(); // رابط الفيديو
            $table->string('infographic_image')->nullable(); // صورة الإنفوجرافيك
            $table->string('thumbnail')->nullable(); // صورة مصغرة
            $table->enum('status', ['active', 'inactive'])->default('active'); // حالة المبادرة
            $table->string('government_entity')->nullable(); // الجهة الحكومية المسؤولة
            $table->date('launch_date')->nullable(); // تاريخ الإطلاق
            $table->text('target_audience')->nullable(); // الفئة المستهدفة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gov_initiatives');
    }
};
