<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bazaar_participations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('activity_type');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('bazaar_participations');
    }
};
