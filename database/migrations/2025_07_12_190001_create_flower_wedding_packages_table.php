<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flower_wedding_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flower_decorator_id'); // مرتبط بمورد الديكورات
            $table->string('package_name'); // اسم الباقة
            $table->text('package_description'); // وصف الباقة
            $table->decimal('price', 10, 2); // سعر الباقة
            $table->string('package_type')->nullable(); // نوع الباقة (زهور، ديكور كامل، إلخ)
            $table->json('includes')->nullable(); // ما تشمله الباقة
            $table->json('package_images')->nullable(); // صور الباقة
            $table->boolean('is_popular')->default(false); // باقة شائعة
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('flower_decorator_id')->references('id')->on('flower_decorators')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('flower_wedding_packages');
    }
};
