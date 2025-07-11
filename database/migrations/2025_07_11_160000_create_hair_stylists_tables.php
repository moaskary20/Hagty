<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
return new class extends Migration {
    public function up() {
        Schema::create('hair_stylists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('works_images');
            $table->string('location')->nullable();
            $table->string('phone');
            $table->string('profile_url')->nullable();
            $table->timestamps();
        });
        Schema::create('hair_stylist_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hair_stylist_id')->constrained('hair_stylists')->onDelete('cascade');
            $table->string('video_url');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('hair_stylist_videos');
        Schema::dropIfExists('hair_stylists');
    }
};
