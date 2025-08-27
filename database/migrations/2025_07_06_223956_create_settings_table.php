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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, image, boolean, json
            $table->string('group')->default('general');
            $table->timestamps();
        });
        
        // إدراج البيانات الافتراضية
        DB::table('settings')->insert([
            [
                'key' => 'site_logo',
                'value' => null,
                'type' => 'image',
                'group' => 'branding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_name',
                'value' => 'منصة HAGTY',
                'type' => 'text',
                'group' => 'branding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'primary_color',
                'value' => '#eb6fab',
                'type' => 'color',
                'group' => 'theme',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
