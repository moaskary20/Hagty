<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('nutrition_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('specialty')->nullable();
            $table->string('clinic_address')->nullable();
            $table->string('google_maps_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_url')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('nutrition_doctors');
    }
};
