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
        Schema::create('baby_doctor_tips', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name')->comment('اسم الطبيب');
            $table->string('doctor_specialization')->comment('تخصص الطبيب');
            $table->string('doctor_title')->comment('لقب الطبيب');
            $table->string('title')->comment('عنوان النصيحة');
            $table->text('content')->comment('محتوى النصيحة');
            $table->string('medical_category')->comment('الفئة الطبية');
            $table->string('urgency_level')->default('عادي')->comment('مستوى الأهمية');
            $table->string('age_group')->comment('الفئة العمرية');
            $table->string('doctor_image')->nullable()->comment('صورة الطبيب');
            $table->string('clinic_name')->nullable()->comment('اسم العيادة');
            $table->string('contact_info')->nullable()->comment('معلومات الاتصال');
            $table->json('symptoms')->nullable()->comment('الأعراض المرتبطة');
            $table->json('warnings')->nullable()->comment('تحذيرات هامة');
            $table->boolean('requires_consultation')->default(false)->comment('يتطلب استشارة');
            $table->boolean('is_emergency')->default(false)->comment('حالة طوارئ');
            $table->boolean('is_active')->default(true)->comment('نشط');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_doctor_tips');
    }
};
