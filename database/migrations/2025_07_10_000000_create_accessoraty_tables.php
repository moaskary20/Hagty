<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accessoraty_shops', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('location'); // رابط خرائط جوجل
            $table->string('shop_url')->nullable(); // رابط المتجر الإلكتروني
            $table->enum('category', ['ذهبية', 'فضية', 'ماسية']);
            $table->timestamps();
        });

        Schema::create('accessoraty_banner_ads', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('link')->nullable();
            $table->timestamps();
        });

        Schema::create('accessoraty_sponsor_videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_url');
            $table->string('skip_after_seconds')->default(6);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accessoraty_shops');
        Schema::dropIfExists('accessoraty_banner_ads');
        Schema::dropIfExists('accessoraty_sponsor_videos');
    }
};
