<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('فيديوهات_الراعي', function (Blueprint $table) {
            $table->id();
            $table->string('عنوان_الفيديو');
            $table->string('ملف_الفيديو'); // اسم الملف أو الرابط
            $table->string('رابط_التحويل')->nullable();
            $table->boolean('حالة_التفعيل')->default(true);
            $table->date('تاريخ_الانتهاء')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('فيديوهات_الراعي');
    }
};
