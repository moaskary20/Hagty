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
        Schema::create('نصائح_الموضة_من_البلوجرز', function (Blueprint $table) {
            $table->id();
            $table->string('عنوان_النصيحة')->comment('عنوان النصيحة');
            $table->string('رابط_الفيديو')->nullable()->comment('رابط الفيديو');
            $table->string('اسم_البلوجر')->nullable()->comment('اسم البلوجر');
            $table->boolean('حالة_الرعاية')->default(false)->comment('هل النصيحة برعاية جهة ما');
            $table->integer('مدة_التخطي')->default(6)->comment('مدة تخطي الفيديو بالثواني (افتراضي 6)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('نصائح_الموضة_من_البلوجرز');
    }
};
