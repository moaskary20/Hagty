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
        Schema::table('babies', function (Blueprint $table) {
            $table->decimal('age', 3, 1)->nullable()->after('birth_date'); // العمر بالسنوات
            $table->decimal('weight', 5, 2)->nullable()->after('age'); // الوزن بالكيلوجرام
            $table->decimal('height', 5, 2)->nullable()->after('weight'); // الطول بالسنتيمتر
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('babies', function (Blueprint $table) {
            $table->dropColumn(['age', 'weight', 'height']);
        });
    }
};
