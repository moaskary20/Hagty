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
        Schema::create('دليل_الفيديوهات_البلوجرز', function (Blueprint $table) {
            $table->id();
            $table->string('عنوان_الفيديو')->comment('عنوان الفيديو');
            $table->string('رابط_الفيديو')->nullable()->comment('رابط الفيديو');
            $table->string('اسم_البلوجر')->nullable()->comment('اسم البلوجر');
            $table->string('التصنيف')->nullable()->comment('تصنيف الفيديو أو الوسوم');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('دليل_الفيديوهات_البلوجرز');
    }
};
