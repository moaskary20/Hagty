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
        Schema::table('family_activities', function (Blueprint $table) {
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('duration')->nullable();
            $table->string('cost')->nullable();
            $table->string('category')->nullable();
            $table->string('age_group')->nullable();
            $table->integer('max_participants')->nullable();
            $table->text('requirements')->nullable();
            $table->string('contact_info')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('family_activities', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'description',
                'location',
                'date',
                'time',
                'duration',
                'cost',
                'category',
                'age_group',
                'max_participants',
                'requirements',
                'contact_info',
                'is_active'
            ]);
        });
    }
};