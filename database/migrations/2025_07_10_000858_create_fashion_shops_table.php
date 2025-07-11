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
        Schema::create('دليل_متاجر_الموضة', function (Blueprint $table) {
            $table->id();
            $table->string('اسم_المتجر')->comment('اسم البراند أو المتجر');
            $table->text('العنوان')->comment('عنوان المتجر');
            $table->string('رابط_الخريطة')->nullable()->comment('رابط موقع المتجر على الخريطة');
            $table->string('رابط_المتجر')->nullable()->comment('رابط صفحة المتجر أو الإي-كومرس');
            $table->string('رقم_الهاتف')->nullable()->comment('رقم الهاتف (اختياري)');
            $table->string('شعار_المتجر')->nullable()->comment('صورة شعار المتجر');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('دليل_متاجر_الموضة');
    }
};
