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
        Schema::create('family_advice', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['طبيب نفسي', 'مرشد أسري اجتماعي', 'مدرب حياة', 'فيديو تعليمي']);
            $table->text('content');
            $table->string('expert_name')->nullable();
            $table->string('expert_credentials')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('video_url')->nullable();
            $table->enum('category', ['نصائح نفسية', 'إرشاد أسري', 'تربية الأطفال', 'العلاقات الزوجية', 'إدارة الضغوط', 'التوازن بين العمل والحياة', 'أخرى']);
            $table->enum('target_audience', ['الآباء', 'الأمهات', 'الأطفال', 'المراهقين', 'الأزواج', 'الجميع']);
            $table->integer('duration_minutes')->nullable(); // مدة الفيديو بالدقائق
            $table->decimal('rating', 2, 1)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_advice');
    }
};
