<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bazaars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('info')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('city');
            $table->string('location')->nullable();
            $table->string('map_url')->nullable();
            $table->string('promo')->nullable();
            $table->string('discounts')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('bazaars');
    }
};
