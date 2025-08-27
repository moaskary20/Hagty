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
        Schema::create('family_health_records', function (Blueprint $table) {
            $table->id();
            $table->string('member_name');
            $table->enum('relationship', ['الأب', 'الأم', 'الابن', 'الابنة', 'الجد', 'الجدة', 'العم', 'العمة', 'الخال', 'الخالة', 'أخرى']);
            $table->date('birth_date')->nullable();
            $table->string('blood_type')->nullable();
            $table->text('chronic_diseases')->nullable();
            $table->text('allergies')->nullable();
            $table->text('current_medications')->nullable();
            $table->string('family_doctor')->nullable();
            $table->string('doctor_phone')->nullable();
            $table->text('emergency_notes')->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('insurance_company')->nullable();
            $table->string('insurance_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_health_records');
    }
};
