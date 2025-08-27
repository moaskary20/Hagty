<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('spa_clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specialty')->nullable();
            $table->string('center_address')->nullable();
            $table->string('google_maps_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_url')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('spa_clinics');
    }
};
