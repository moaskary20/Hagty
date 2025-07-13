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
        Schema::create('wedding_venue_banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_venue_id')->nullable(); // مرتبط بفندق معين (اختياري)
            $table->string('title'); // عنوان اللافتة
            $table->string('banner_image'); // صورة اللافتة
            $table->string('link_url')->nullable(); // رابط عند الضغط
            $table->text('offer_description')->nullable(); // وصف العرض
            $table->date('valid_until')->nullable(); // صالح حتى تاريخ
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('wedding_venue_id')->references('id')->on('wedding_venues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_venue_banners');
    }
};
