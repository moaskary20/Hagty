<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gift_product_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_gift_supplier_id'); // مرتبط بمورد الهدايا
            $table->string('gallery_name'); // اسم المعرض
            $table->text('gallery_description')->nullable(); // وصف المعرض
            $table->json('gallery_images'); // صور المعرض
            $table->string('product_type')->nullable(); // نوع المنتج
            $table->decimal('price_range_min', 10, 2)->nullable(); // أقل سعر
            $table->decimal('price_range_max', 10, 2)->nullable(); // أعلى سعر
            $table->json('available_colors')->nullable(); // الألوان المتاحة
            $table->json('available_sizes')->nullable(); // الأحجام المتاحة
            $table->boolean('is_handmade')->default(true); // منتج يدوي
            $table->boolean('is_customizable')->default(false); // قابل للتخصيص
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('wedding_gift_supplier_id')->references('id')->on('wedding_gift_suppliers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gift_product_galleries');
    }
};
