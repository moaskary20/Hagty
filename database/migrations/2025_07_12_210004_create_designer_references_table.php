<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('designer_references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_dress_designer_id')->constrained()->onDelete('cascade');
            $table->string('reference_type'); // website, social_media, portfolio, review
            $table->string('reference_title');
            $table->string('reference_url');
            $table->text('reference_description')->nullable();
            $table->string('platform_name')->nullable();
            $table->integer('display_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('designer_references');
    }
};
