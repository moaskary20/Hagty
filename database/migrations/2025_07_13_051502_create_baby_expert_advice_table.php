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
        Schema::create('baby_expert_advice', function (Blueprint $table) {
            $table->id();
            $table->string('expert_name')->comment('اسم الخبير');
            $table->string('expert_title')->comment('مسمى الخبير الوظيفي');
            $table->string('expert_specialization')->comment('تخصص الخبير');
            $table->string('title')->comment('عنوان النصيحة');
            $table->text('content')->comment('محتوى النصيحة');
            $table->string('category')->comment('فئة النصيحة');
            $table->string('target_age')->comment('العمر المستهدف');
            $table->string('expert_image')->nullable()->comment('صورة الخبير');
            $table->string('video_url')->nullable()->comment('رابط فيديو');
            $table->integer('rating')->default(5)->comment('التقييم');
            $table->boolean('is_featured')->default(false)->comment('مميز');
            $table->boolean('is_active')->default(true)->comment('نشط');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_expert_advice');
    }
};
