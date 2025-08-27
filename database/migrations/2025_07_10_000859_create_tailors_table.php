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
        Schema::create('دليل_الترزية', function (Blueprint $table) {
            $table->id();
            $table->string('اسم_الترزي')->comment('اسم الترزي');
            $table->string('الموقع')->nullable()->comment('موقع الترزي');
            $table->string('رابط_الخريطة')->nullable()->comment('رابط موقع الترزي على الخريطة');
            $table->text('نصائح_الخياطة')->nullable()->comment('نصائح في الخياطة');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('دليل_الترزية');
    }
};
