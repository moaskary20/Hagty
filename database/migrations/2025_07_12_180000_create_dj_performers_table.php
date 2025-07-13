<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dj_performers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم مشغل الدي جي
            $table->string('specialty')->nullable(); // التخصص (DJ, عازف, فرقة)
            $table->json('phone_numbers')->nullable(); // أرقام الهواتف
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->text('description')->nullable(); // وصف الخدمات
            $table->json('portfolio_images')->nullable(); // صور المراجع
            $table->json('portfolio_videos')->nullable(); // فيديوهات المراجع
            $table->string('website_url')->nullable(); // رابط الموقع
            $table->string('instagram_url')->nullable(); // رابط الانستقرام
            $table->string('facebook_url')->nullable(); // رابط الفيسبوك
            $table->decimal('starting_price', 10, 2)->nullable(); // السعر المبدئي
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dj_performers');
    }
};
