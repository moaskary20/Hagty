<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('fashion_trend_categories', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('fashion_trend_categories', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
