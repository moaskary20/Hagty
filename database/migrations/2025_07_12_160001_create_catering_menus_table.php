<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('catering_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catering_service_id');
            $table->string('menu_name'); // اسم القائمة
            $table->string('menu_type'); // نوع القائمة (إفطار، غداء، عشاء، مقبلات، حلويات)
            $table->text('description')->nullable(); // وصف القائمة
            $table->json('menu_items')->nullable(); // عناصر القائمة
            $table->decimal('price_per_person', 10, 2)->nullable(); // السعر للشخص الواحد
            $table->integer('min_persons')->default(1); // أقل عدد أشخاص
            $table->json('menu_images')->nullable(); // صور القائمة
            $table->boolean('is_available')->default(true);
            $table->timestamps();
            
            $table->foreign('catering_service_id')->references('id')->on('catering_services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('catering_menus');
    }
};
