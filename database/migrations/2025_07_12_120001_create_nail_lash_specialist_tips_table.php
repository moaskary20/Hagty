<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('nail_lash_specialist_tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nail_lash_specialist_id')->constrained('nail_lash_specialists')->onDelete('cascade');
            $table->text('tip');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('nail_lash_specialist_tips');
    }
};
