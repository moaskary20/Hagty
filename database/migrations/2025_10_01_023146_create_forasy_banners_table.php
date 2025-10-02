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
        Schema::create('forasy_banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->nullable()->constrained('forasy_jobs')->onDelete('cascade'); // معرف الوظيفة (اختياري)
            $table->string('title'); // عنوان البانر
            $table->string('banner_image'); // صورة البانر
            $table->string('link_url')->nullable(); // رابط البانر
            $table->text('description')->nullable(); // وصف
            $table->string('offer_description')->nullable(); // وصف العرض
            $table->date('valid_until')->nullable(); // صالح حتى
            $table->integer('display_order')->default(0); // ترتيب العرض
            $table->boolean('is_active')->default(true); // نشط
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forasy_banners');
    }
};
