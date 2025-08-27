<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('designer_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_dress_designer_id')->constrained()->onDelete('cascade');
            $table->string('offer_title');
            $table->text('offer_description')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->decimal('original_price', 10, 2)->nullable();
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->json('offer_images')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('max_uses')->nullable();
            $table->integer('current_uses')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('designer_offers');
    }
};
