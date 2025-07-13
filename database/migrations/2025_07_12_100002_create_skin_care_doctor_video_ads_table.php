<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('skin_care_doctor_video_ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skin_care_doctor_id')->nullable()->constrained('skin_care_doctors')->onDelete('set null');
            $table->string('video_url');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('skin_care_doctor_video_ads');
    }
};
