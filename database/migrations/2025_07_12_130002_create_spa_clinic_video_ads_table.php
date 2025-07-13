<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('spa_clinic_video_ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spa_clinic_id')->nullable()->constrained('spa_clinics')->onDelete('set null');
            $table->string('video_url');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('spa_clinic_video_ads');
    }
};
