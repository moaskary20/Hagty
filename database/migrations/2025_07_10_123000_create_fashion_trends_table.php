<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('صيحات_الموضة', function (Blueprint $table) {
            $table->id();
            $table->string('العنوان');
            $table->text('الوصف')->nullable();
            $table->string('الصورة')->nullable();
            $table->enum('النوع', ['نصيحة', 'مدونة', 'فيديو'])->default('نصيحة');
            $table->string('رابط_الفيديو')->nullable();
            $table->boolean('حالة_التفعيل')->default(true);
            $table->date('تاريخ_النشر')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('صيحات_الموضة');
    }
};
