<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('designer_video_ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_dress_designer_id')->constrained()->onDelete('cascade');
            $table->string('sponsor_name');
            $table->string('sponsor_logo')->nullable();
            $table->string('ad_title');
            $table->text('ad_description')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_file')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('sponsor_website')->nullable();
            $table->string('sponsor_contact')->nullable();
            $table->integer('display_duration')->default(30);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('click_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->integer('priority_order')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('designer_video_ads');
    }
};
