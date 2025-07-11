<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('متاجر_الإكسسوارات', function (Blueprint $table) {
            $table->id();
            $table->string('اسم_العلامة_التجارية');
            $table->string('الموقع'); // رابط خرائط جوجل
            $table->string('رابط_المتجر')->nullable();
            $table->enum('فئة_التاجر', ['ذهبية', 'فضية', 'ماسية'])->default('فضية');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('متاجر_الإكسسوارات');
    }
};
