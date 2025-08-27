<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wedding_venue_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_venue_id');
            $table->string('package_name'); // اسم الباقة
            $table->enum('package_type', ['bronze', 'silver', 'gold', 'platinum', 'custom']); // نوع الباقة
            $table->text('description')->nullable(); // وصف الباقة
            $table->json('included_services'); // الخدمات المشمولة
            $table->json('menu_ids')->nullable(); // قوائم الطعام المرتبطة
            $table->decimal('price_per_person', 10, 2); // السعر للشخص
            $table->decimal('discount_percentage', 5, 2)->default(0); // نسبة الخصم
            $table->integer('min_guests')->default(50); // أقل عدد ضيوف
            $table->integer('max_guests')->default(500); // أكبر عدد ضيوف
            $table->string('package_image')->nullable(); // صورة الباقة
            $table->date('valid_from')->nullable(); // صالح من تاريخ
            $table->date('valid_until')->nullable(); // صالح حتى تاريخ
            $table->boolean('is_featured')->default(false); // باقة مميزة
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('wedding_venue_id')->references('id')->on('wedding_venues')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wedding_venue_packages');
    }
};
