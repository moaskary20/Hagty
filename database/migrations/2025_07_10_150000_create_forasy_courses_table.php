<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forasy_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('اسم الدورة');
            $table->string('short_description', 255)->nullable()->comment('وصف مختصر');
            $table->text('description')->nullable()->comment('وصف تفصيلي');
            $table->string('video_url')->nullable()->comment('رابط فيديو الدورة');
            $table->string('cover_image')->nullable()->comment('صورة الغلاف');
            $table->string('category')->nullable()->comment('تصنيف الدورة');
            $table->boolean('is_active')->default(true)->comment('نشطة');
            $table->timestamp('published_at')->nullable()->comment('تاريخ النشر');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forasy_courses');
    }
};
