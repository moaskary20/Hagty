<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('designer_banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_dress_designer_id')->constrained()->onDelete('cascade');
            $table->string('banner_title');
            $table->text('banner_description')->nullable();
            $table->string('banner_image');
            $table->string('banner_type')->default('promotion');
            $table->string('link_url')->nullable();
            $table->integer('display_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->integer('click_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('designer_banners');
    }
};
