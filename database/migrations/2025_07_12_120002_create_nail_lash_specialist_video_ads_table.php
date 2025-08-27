<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('nail_lash_specialist_video_ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nail_lash_specialist_id')->nullable()->constrained('nail_lash_specialists')->onDelete('set null');
            $table->string('video_url');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('nail_lash_specialist_video_ads');
    }
};
