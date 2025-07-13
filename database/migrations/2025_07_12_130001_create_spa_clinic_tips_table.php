<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('spa_clinic_tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spa_clinic_id')->constrained('spa_clinics')->onDelete('cascade');
            $table->text('tip');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('spa_clinic_tips');
    }
};
