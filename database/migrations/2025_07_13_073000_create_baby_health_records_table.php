<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('baby_health_records', function (Blueprint $table) {
            $table->id();
            $table->string('baby_name'); // اسم الطفل
            $table->date('birth_date'); // تاريخ الميلاد
            $table->enum('gender', ['ذكر', 'أنثى']); // الجنس
            $table->decimal('weight', 5, 2)->nullable(); // الوزن بالكيلوجرام
            $table->decimal('height', 5, 2)->nullable(); // الطول بالسنتيمتر
            $table->string('blood_type')->nullable(); // فصيلة الدم
            $table->text('allergies')->nullable(); // الحساسية
            $table->text('medical_conditions')->nullable(); // الحالات الطبية
            $table->json('vaccination_record')->nullable(); // سجل التطعيمات
            $table->text('notes')->nullable(); // ملاحظات
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('baby_health_records');
    }
};
