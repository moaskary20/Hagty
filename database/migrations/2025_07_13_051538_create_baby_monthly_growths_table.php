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
        Schema::create('baby_monthly_growths', function (Blueprint $table) {
            $table->id();
            $table->integer('month_number')->comment('رقم الشهر');
            $table->string('title')->comment('عنوان النمو');
            $table->text('description')->comment('وصف النمو');
            $table->json('physical_development')->nullable()->comment('التطور الجسدي');
            $table->json('mental_development')->nullable()->comment('التطور الذهني');
            $table->json('social_development')->nullable()->comment('التطور الاجتماعي');
            $table->json('milestones')->nullable()->comment('المعالم المهمة');
            $table->json('feeding_info')->nullable()->comment('معلومات التغذية');
            $table->json('sleep_info')->nullable()->comment('معلومات النوم');
            $table->json('safety_tips')->nullable()->comment('نصائح الأمان');
            $table->string('weight_range')->nullable()->comment('نطاق الوزن');
            $table->string('height_range')->nullable()->comment('نطاق الطول');
            $table->string('image')->nullable()->comment('صورة توضيحية');
            $table->json('activities')->nullable()->comment('أنشطة مقترحة');
            $table->json('warning_signs')->nullable()->comment('علامات التحذير');
            $table->boolean('is_active')->default(true)->comment('نشط');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_monthly_growths');
    }
};
