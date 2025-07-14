<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_outing_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['مطعم', 'كافيه', 'مخيم', 'فندق - استخدام يومي', 'مركز تسوق', 'متحف', 'حديقة', 'أخرى']);
            $table->text('address');
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->string('price_range')->nullable();
            $table->string('working_hours')->nullable();
            $table->json('facilities')->nullable(); // مرافق مثل موقف سيارات، كراسي أطفال، إلخ
            $table->string('website')->nullable();
            $table->boolean('family_friendly')->default(true);
            $table->string('age_group')->nullable(); // الفئة العمرية المناسبة
            $table->text('special_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_outing_areas');
    }
};
