<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
return new class extends Migration {
    public function up() {
        Schema::create('beauty_tips', function (Blueprint $table) {
            $table->id();
            $table->text('tip');
            $table->timestamps();
        });
        Schema::create('hair_blog_videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_title');
            $table->text('video_text');
            $table->string('video_url');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('hair_blog_videos');
        Schema::dropIfExists('beauty_tips');
    }
};
