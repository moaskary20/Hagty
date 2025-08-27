<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('إعلانات_بانر_الإكسسوارات', function (Blueprint $table) {
            $table->id();
            $table->string('عنوان_الإعلان');
            $table->json('صور_الإعلان');
            $table->string('رابط_الإعلان')->nullable();
            $table->boolean('حالة_التفعيل')->default(true);
            $table->date('تاريخ_الانتهاء')->nullable();
            $table->enum('نوع_الإعلان', ['بانر', 'راعي'])->default('بانر');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('إعلانات_بانر_الإكسسوارات');
    }
};
