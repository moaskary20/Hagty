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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // الاسم
            $table->string('specialty'); // التخصص
            $table->text('address'); // العنوان
            $table->json('emergency_numbers'); // أرقام الطوارئ (متعددة)
            $table->string('phone'); // رقم الهاتف
            $table->string('google_maps_link')->nullable(); // رابط Google Maps
            $table->string('booking_link')->nullable(); // رابط الحجز
            $table->string('image')->nullable(); // صورة المستشفى
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
