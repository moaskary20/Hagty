<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('plastic_surgeon_tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plastic_surgeon_id')->constrained('plastic_surgeons')->onDelete('cascade');
            $table->text('tip');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('plastic_surgeon_tips');
    }
};
