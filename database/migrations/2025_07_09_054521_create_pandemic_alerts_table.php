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
        Schema::create('pandemic_alerts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان التنبيه
            $table->text('description'); // وصف التنبيه
            $table->enum('alert_level', ['low', 'medium', 'high', 'critical'])->default('medium'); // مستوى التنبيه
            $table->enum('content_type', ['video', 'infographic', 'both'])->default('video'); // نوع المحتوى
            $table->string('video_url')->nullable(); // رابط الفيديو
            $table->string('infographic_image')->nullable(); // صورة الرسم البياني
            $table->string('audio_message')->nullable(); // الرسالة الصوتية
            $table->text('safety_procedures'); // إجراءات السلامة
            $table->string('thumbnail')->nullable(); // صورة مصغرة
            $table->enum('status', ['active', 'inactive'])->default('active'); // حالة التنبيه
            $table->string('health_authority')->nullable(); // الجهة الصحية المسؤولة
            $table->date('alert_date')->nullable(); // تاريخ التنبيه
            $table->date('expiry_date')->nullable(); // تاريخ انتهاء التنبيه
            $table->text('target_areas')->nullable(); // المناطق المستهدفة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pandemic_alerts');
    }
};
