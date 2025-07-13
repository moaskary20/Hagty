<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('wedding_planners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('location')->nullable();
            $table->string('google_maps_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_url')->nullable();
            $table->string('package')->nullable();
            $table->string('venue')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('wedding_planners');
    }
};
