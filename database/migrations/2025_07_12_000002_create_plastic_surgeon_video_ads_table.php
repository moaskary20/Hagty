<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('plastic_surgeon_video_ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plastic_surgeon_id')->nullable()->constrained('plastic_surgeons')->onDelete('set null');
            $table->string('video_url');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('plastic_surgeon_video_ads');
    }
};
