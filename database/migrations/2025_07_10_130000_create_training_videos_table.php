<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('training_videos', function (Blueprint $table) {
            $table->id();
            $table->string('عنوان_الفيديو');
            $table->text('وصف_الفيديو')->nullable();
            $table->string('رابط_الفيديو');
            $table->string('صورة_الغلاف')->nullable();
            $table->string('التصنيف')->nullable(); // مثل: تطوير ذات، موضة، إكسسوارات
            $table->string('النوع')->nullable(); // مجاني/مدفوع
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('training_videos');
    }
};
