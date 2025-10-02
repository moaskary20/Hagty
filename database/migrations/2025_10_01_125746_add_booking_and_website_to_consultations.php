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
        Schema::table('health_consultations', function (Blueprint $table) {
            $table->string('booking_url')->nullable()->after('contact_phone');
            $table->string('website_url')->nullable()->after('booking_url');
        });

        Schema::table('career_consultations', function (Blueprint $table) {
            $table->string('booking_url')->nullable()->after('contact_phone');
            $table->string('website_url')->nullable()->after('booking_url');
        });

        Schema::table('family_consultations', function (Blueprint $table) {
            $table->string('booking_url')->nullable()->after('contact_phone');
            $table->string('website_url')->nullable()->after('booking_url');
        });

        Schema::table('business_consultations', function (Blueprint $table) {
            $table->string('website_url')->nullable()->after('contact_phone');
            // ensure contact_phone exists; base migration has it
        });

        Schema::table('psychological_support', function (Blueprint $table) {
            $table->string('booking_url')->nullable()->after('contact_phone');
            $table->string('website_url')->nullable()->after('booking_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('health_consultations', function (Blueprint $table) {
            $table->dropColumn(['booking_url', 'website_url']);
        });
        Schema::table('career_consultations', function (Blueprint $table) {
            $table->dropColumn(['booking_url', 'website_url']);
        });
        Schema::table('family_consultations', function (Blueprint $table) {
            $table->dropColumn(['booking_url', 'website_url']);
        });
        Schema::table('business_consultations', function (Blueprint $table) {
            $table->dropColumn(['website_url']);
        });
        Schema::table('psychological_support', function (Blueprint $table) {
            $table->dropColumn(['booking_url', 'website_url']);
        });
    }
};
