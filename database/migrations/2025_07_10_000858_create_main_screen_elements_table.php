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
        Schema::create('عناصر_الشاشة_الرئيسية', function (Blueprint $table) {
            $table->id();
            // نوع العنصر في الشاشة الرئيسية: شعار راعي، بانر إعلاني، فيديو، أو عرض
            $table->enum('نوع', ['شعار_راعي', 'بانر_إعلاني', 'فيديو_إعلاني', 'عرض'])->comment('نوع العنصر: شعار راعي، بانر، فيديو، عرض');

            // 1. بيانات شعارات الرعاة
            $table->string('صورة_الشعار')->nullable()->comment('صورة شعار الراعي');
            $table->string('اسم_الراعي')->nullable()->comment('اسم الراعي');
            $table->string('رابط_الراعي')->nullable()->comment('رابط الراعي');

            // 2. بيانات بانر الإعلانات المتحرك
            $table->string('صورة_البانر')->nullable()->comment('صورة البانر الإعلاني');
            $table->string('رابط_الإعلان')->nullable()->comment('رابط الإعلان');
            $table->string('عنوان_الإعلان')->nullable()->comment('عنوان الإعلان أو العرض');
            $table->boolean('حالة_التفعيل')->default(true)->comment('حالة التفعيل (نشط/غير نشط)');

            // 3. بيانات إعلان الفيديو
            $table->string('رابط_الفيديو')->nullable()->comment('رابط الفيديو الإعلاني');
            $table->integer('مدة_التخطي')->nullable()->default(6)->comment('مدة تخطي الفيديو بالثواني (افتراضي 6)');

            // 4. بيانات العروض والخصومات
            $table->string('عنوان_العرض')->nullable()->comment('عنوان العرض');
            $table->text('وصف_العرض')->nullable()->comment('وصف العرض أو الخصم');
            $table->string('صورة_العرض')->nullable()->comment('صورة العرض');
            $table->string('رابط_المتجر')->nullable()->comment('رابط المتجر الخاص بالعرض');
            $table->date('تاريخ_الانتهاء')->nullable()->comment('تاريخ انتهاء العرض أو الخصم');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('عناصر_الشاشة_الرئيسية');
    }
};
