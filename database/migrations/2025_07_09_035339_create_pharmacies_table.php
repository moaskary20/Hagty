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
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الصيدلية
            $table->text('address'); // العنوان
            $table->string('phone'); // رقم الهاتف
            $table->string('google_maps_link')->nullable(); // رابط Google Maps
            $table->string('online_order_link')->nullable(); // رابط الطلب أونلاين
            $table->string('image')->nullable(); // صورة الصيدلية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacies');
    }
};
