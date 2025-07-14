<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kid_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name'); // اسم الطبيب
            $table->string('specialization'); // التخصص
            $table->string('phone'); // رقم الهاتف
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->text('address')->nullable(); // العنوان
            $table->string('clinic_name')->nullable(); // اسم العيادة
            $table->string('working_hours')->nullable(); // ساعات العمل
            $table->string('emergency_phone')->nullable(); // هاتف الطوارئ
            $table->text('notes')->nullable(); // ملاحظات
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kid_doctors');
    }
};
