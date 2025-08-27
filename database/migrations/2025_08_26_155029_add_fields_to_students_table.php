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
        Schema::table('students', function (Blueprint $table) {
            // إضافة الحقول الجديدة
            $table->string('last_name')->after('name');
            $table->integer('age')->after('last_name');
            $table->string('city')->after('age');
            $table->string('education_level')->after('city');
            $table->string('experience_level')->after('education_level');
            $table->text('goals')->after('experience_level');
            $table->timestamp('registration_date')->after('goals');
            $table->string('status')->default('active')->after('registration_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // حذف الحقول المضافة
            $table->dropColumn([
                'last_name',
                'age',
                'city',
                'education_level',
                'experience_level',
                'goals',
                'registration_date',
                'status'
            ]);
        });
    }
};
