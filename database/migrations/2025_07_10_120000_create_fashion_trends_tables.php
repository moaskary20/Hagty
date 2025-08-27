<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // أقسام مدونات الأناقة
        Schema::create('fashion_trend_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // مواضيع مدونات الأناقة
        Schema::create('fashion_trends', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained('fashion_trend_categories')->onDelete('cascade');
            $table->timestamps();
        });

        // فيديوهات مدونات الأناقة
        Schema::create('fashion_trend_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->foreignId('trend_id')->constrained('fashion_trends')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fashion_trend_videos');
        Schema::dropIfExists('fashion_trends');
        Schema::dropIfExists('fashion_trend_categories');
    }
};
