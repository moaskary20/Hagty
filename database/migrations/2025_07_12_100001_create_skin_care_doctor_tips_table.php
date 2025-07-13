<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('skin_care_doctor_tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skin_care_doctor_id')->constrained('skin_care_doctors')->onDelete('cascade');
            $table->text('tip');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('skin_care_doctor_tips');
    }
};
