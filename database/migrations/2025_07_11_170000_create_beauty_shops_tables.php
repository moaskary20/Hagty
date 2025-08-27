<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
return new class extends Migration {
    public function up() {
        Schema::create('beauty_shops', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('location');
            $table->string('shop_url')->nullable();
            $table->timestamps();
        });
        Schema::create('beauty_shop_banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beauty_shop_id')->constrained('beauty_shops')->onDelete('cascade');
            $table->string('image');
            $table->string('link')->nullable();
            $table->timestamps();
        });
        Schema::create('beauty_shop_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beauty_shop_id')->constrained('beauty_shops')->onDelete('cascade');
            $table->string('video_url');
            $table->integer('skip_after_seconds')->default(6);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('beauty_shop_videos');
        Schema::dropIfExists('beauty_shop_banners');
        Schema::dropIfExists('beauty_shops');
    }
};
