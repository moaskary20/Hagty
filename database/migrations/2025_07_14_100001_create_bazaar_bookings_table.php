<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bazaar_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bazaar_id')->constrained('bazaars')->onDelete('cascade');
            $table->string('participant_name');
            $table->string('project_name')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('city');
            $table->string('location')->nullable();
            $table->date('date');
            $table->integer('days')->default(1);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('bazaar_bookings');
    }
};
