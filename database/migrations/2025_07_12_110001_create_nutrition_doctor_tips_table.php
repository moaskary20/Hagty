<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('nutrition_doctor_tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutrition_doctor_id')->constrained('nutrition_doctors')->onDelete('cascade');
            $table->text('tip');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('nutrition_doctor_tips');
    }
};
