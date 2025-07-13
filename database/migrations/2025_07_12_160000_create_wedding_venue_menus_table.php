<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wedding_venue_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_venue_id');
            $table->string('menu_name'); // اسم القائمة
            $table->enum('menu_type', ['appetizers', 'main_courses', 'desserts', 'beverages', 'custom']); // نوع القائمة
            $table->text('description')->nullable(); // وصف القائمة
            $table->json('menu_items'); // عناصر القائمة
            $table->decimal('price_per_person', 10, 2); // السعر للشخص الواحد
            $table->string('menu_image')->nullable(); // صورة القائمة
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('wedding_venue_id')->references('id')->on('wedding_venues')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wedding_venue_menus');
    }
};
