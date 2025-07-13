<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('nutrition_doctor_video_ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutrition_doctor_id')->nullable()->constrained('nutrition_doctors')->onDelete('set null');
            $table->string('video_url');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('nutrition_doctor_video_ads');
    }
};
