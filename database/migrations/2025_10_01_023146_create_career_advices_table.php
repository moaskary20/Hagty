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
        Schema::create('career_advices', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان النصيحة
            $table->text('content'); // محتوى النصيحة
            $table->string('category')->nullable(); // التصنيف (السيرة الذاتية، المقابلات، التطوير الوظيفي)
            $table->string('author')->nullable(); // كاتب النصيحة
            $table->string('image')->nullable(); // صورة النصيحة
            $table->boolean('is_featured')->default(false); // نصيحة مميزة
            $table->boolean('is_active')->default(true); // نشط
            $table->integer('views')->default(0); // عدد المشاهدات
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_advices');
    }
};
