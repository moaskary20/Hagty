<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wedding_photographer_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photographer_id'); // مرتبط بالمصور
            $table->string('name'); // اسم الباقة
            $table->text('description')->nullable(); // وصف الباقة
            $table->decimal('price', 10, 2); // السعر
            $table->json('included_services')->nullable(); // الخدمات المشمولة
            $table->integer('duration_hours')->nullable(); // مدة التصوير بالساعات
            $table->integer('edited_photos_count')->nullable(); // عدد الصور المعدلة
            $table->integer('edited_videos_count')->nullable(); // عدد الفيديوهات المعدلة
            $table->boolean('includes_album')->default(false); // يشمل ألبوم مطبوع
            $table->boolean('includes_usb')->default(false); // يشمل فلاش ميموري
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('photographer_id')->references('id')->on('wedding_photographers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wedding_photographer_packages');
    }
};
