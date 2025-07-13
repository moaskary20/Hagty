<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wedding_dress_designers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand_name')->nullable();
            $table->text('description')->nullable();
            $table->string('specialty')->nullable();
            $table->integer('experience_years')->nullable();
            $table->text('address')->nullable();
            $table->json('phone_numbers')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('google_maps_url')->nullable();
            $table->json('portfolio_images')->nullable();
            $table->json('working_hours')->nullable();
            $table->decimal('price_range_min', 10, 2)->nullable();
            $table->decimal('price_range_max', 10, 2)->nullable();
            $table->boolean('offers_rentals')->default(false);
            $table->boolean('offers_custom_design')->default(false);
            $table->boolean('offers_alterations')->default(false);
            $table->json('available_sizes')->nullable();
            $table->json('dress_styles')->nullable();
            $table->json('fabric_types')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->decimal('rating', 3, 1)->default(0);
            $table->integer('total_reviews')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wedding_dress_designers');
    }
};
