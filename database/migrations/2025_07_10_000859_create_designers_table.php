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
        Schema::create('دليل_المصممين', function (Blueprint $table) {
            $table->id();
            $table->string('اسم_المصمم')->comment('اسم المصمم');
            $table->string('الموقع')->nullable()->comment('موقع المصمم');
            $table->text('معرض_الأعمال')->nullable()->comment('معرض الأعمال (صور/فيديوهات)');
            $table->string('رابط_الفيديو_القصير')->nullable()->comment('رابط فيديو قصير');
            $table->string('رابط_الدورات')->nullable()->comment('رابط الدورات أو الكورسات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('دليل_المصممين');
    }
};
