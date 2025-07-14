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
        Schema::create('baby_health_infos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('عنوان المعلومة الصحية');
            $table->text('content')->comment('محتوى المعلومة');
            $table->string('category')->comment('الفئة (تغذية، نوم، نظافة، إلخ)');
            $table->string('age_range')->comment('الفئة العمرية');
            $table->string('importance_level')->default('متوسط')->comment('مستوى الأهمية');
            $table->string('author')->nullable()->comment('الكاتب');
            $table->string('source')->nullable()->comment('المصدر');
            $table->string('image')->nullable()->comment('صورة توضيحية');
            $table->json('related_links')->nullable()->comment('روابط ذات صلة');
            $table->boolean('is_featured')->default(false)->comment('مميز');
            $table->boolean('is_active')->default(true)->comment('نشط');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_health_infos');
    }
};
