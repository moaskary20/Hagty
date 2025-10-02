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
        Schema::table('forasy_banners', function (Blueprint $table) {
            $table->string('main_title')->nullable()->after('title');
            $table->string('subtitle')->nullable()->after('main_title');
            $table->string('button_text')->nullable()->after('subtitle');
            $table->string('button_url')->nullable()->after('button_text');
            $table->string('text_position')->default('center')->after('button_url'); // center, left, right
            $table->string('text_color')->default('#ffffff')->after('text_position');
            $table->string('button_color')->default('#d94288')->after('text_color');
            $table->boolean('show_overlay')->default(true)->after('button_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forasy_banners', function (Blueprint $table) {
            $table->dropColumn([
                'main_title',
                'subtitle', 
                'button_text',
                'button_url',
                'text_position',
                'text_color',
                'button_color',
                'show_overlay'
            ]);
        });
    }
};