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
        Schema::create('baby_day_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('عنوان الخطوة');
            $table->text('description')->comment('وصف الخطوة');
            $table->integer('step_number')->comment('رقم الخطوة');
            $table->string('age_group')->comment('الفئة العمرية');
            $table->string('category')->default('عام')->comment('الفئة');
            $table->string('difficulty_level')->default('سهل')->comment('مستوى الصعوبة');
            $table->string('image')->nullable()->comment('صورة الخطوة');
            $table->json('tips')->nullable()->comment('نصائح إضافية');
            $table->boolean('is_active')->default(true)->comment('نشط');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_day_steps');
    }
};
