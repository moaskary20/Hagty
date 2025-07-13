<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gift_supplier_ideas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_gift_supplier_id'); // مرتبط بمورد الهدايا
            $table->string('idea_title'); // عنوان الفكرة
            $table->text('idea_description'); // وصف الفكرة
            $table->json('idea_images')->nullable(); // صور الفكرة
            $table->string('occasion_type')->nullable(); // نوع المناسبة (زفاف، خطوبة، إلخ)
            $table->decimal('estimated_price', 10, 2)->nullable(); // السعر المتوقع
            $table->integer('preparation_days')->nullable(); // أيام التحضير
            $table->json('materials_used')->nullable(); // المواد المستخدمة
            $table->boolean('is_trending')->default(false); // فكرة رائجة
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('wedding_gift_supplier_id')->references('id')->on('wedding_gift_suppliers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gift_supplier_ideas');
    }
};
