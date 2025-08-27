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
        // إضافة عمود booking_url لجدول plastic_surgeons
        Schema::table('plastic_surgeons', function (Blueprint $table) {
            $table->string('booking_url')->nullable()->after('phone');
        });
        
        // إضافة عمود booking_url لجدول hair_stylists
        Schema::table('hair_stylists', function (Blueprint $table) {
            $table->string('booking_url')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف عمود booking_url من جدول plastic_surgeons
        Schema::table('plastic_surgeons', function (Blueprint $table) {
            $table->dropColumn('booking_url');
        });
        
        // حذف عمود booking_url من جدول hair_stylists
        Schema::table('hair_stylists', function (Blueprint $table) {
            $table->dropColumn('booking_url');
        });
    }
};
