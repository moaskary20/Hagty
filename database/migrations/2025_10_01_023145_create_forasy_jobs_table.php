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
        Schema::create('forasy_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان الوظيفة
            $table->text('description'); // وصف الوظيفة
            $table->string('company_name'); // اسم الشركة
            $table->string('company_logo')->nullable(); // شعار الشركة
            $table->string('location')->nullable(); // الموقع
            $table->string('job_type'); // نوع الوظيفة (دوام كامل، جزئي، عن بعد)
            $table->string('experience_level'); // مستوى الخبرة (مبتدئ، متوسط، خبير)
            $table->string('salary_range')->nullable(); // نطاق الراتب
            $table->text('requirements')->nullable(); // المتطلبات
            $table->text('responsibilities')->nullable(); // المسؤوليات
            $table->text('benefits')->nullable(); // المزايا
            $table->string('category')->nullable(); // التصنيف (IT, Marketing, etc.)
            $table->string('contact_email')->nullable(); // بريد التواصل
            $table->string('contact_phone')->nullable(); // هاتف التواصل
            $table->string('application_url')->nullable(); // رابط التقديم
            $table->date('deadline')->nullable(); // آخر موعد للتقديم
            $table->boolean('is_featured')->default(false); // وظيفة مميزة
            $table->boolean('is_active')->default(true); // نشط
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forasy_jobs');
    }
};
