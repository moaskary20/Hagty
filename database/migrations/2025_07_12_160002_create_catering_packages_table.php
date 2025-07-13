<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('catering_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catering_service_id');
            $table->string('package_name'); // اسم الباقة
            $table->text('description')->nullable(); // وصف الباقة
            $table->json('included_items')->nullable(); // العناصر المشمولة
            $table->decimal('price_per_person', 10, 2); // السعر للشخص
            $table->integer('min_persons')->default(50); // أقل عدد أشخاص
            $table->integer('max_persons')->nullable(); // أقصى عدد أشخاص
            $table->json('package_images')->nullable(); // صور الباقة
            $table->string('offer_type')->nullable(); // نوع العرض (خصم، مجاني، إلخ)
            $table->decimal('discount_percentage', 5, 2)->nullable(); // نسبة الخصم
            $table->date('offer_valid_until')->nullable(); // صالح حتى
            $table->boolean('is_featured')->default(false); // باقة مميزة
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->foreign('catering_service_id')->references('id')->on('catering_services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('catering_packages');
    }
};
