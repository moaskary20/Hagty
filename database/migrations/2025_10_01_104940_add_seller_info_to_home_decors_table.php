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
        Schema::table('home_decors', function (Blueprint $table) {
            $table->string('seller_name')->nullable()->after('shop_url');
            $table->string('seller_phone')->nullable()->after('seller_name');
            $table->string('seller_email')->nullable()->after('seller_phone');
            $table->string('seller_address')->nullable()->after('seller_email');
            $table->string('seller_whatsapp')->nullable()->after('seller_address');
            $table->text('seller_description')->nullable()->after('seller_whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_decors', function (Blueprint $table) {
            $table->dropColumn(['seller_name', 'seller_phone', 'seller_email', 'seller_address', 'seller_whatsapp', 'seller_description']);
        });
    }
};
