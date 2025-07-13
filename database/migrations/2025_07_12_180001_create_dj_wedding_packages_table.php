<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dj_wedding_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dj_performer_id'); // مرتبط بمشغل الدي جي
            $table->string('package_name'); // اسم الباقة
            $table->text('package_description'); // وصف الباقة
            $table->decimal('price', 10, 2); // سعر الباقة
            $table->integer('duration_hours')->nullable(); // مدة العرض بالساعات
            $table->json('includes')->nullable(); // ما تشمله الباقة
            $table->boolean('is_popular')->default(false); // باقة شائعة
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
            
            $table->foreign('dj_performer_id')->references('id')->on('dj_performers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dj_wedding_packages');
    }
};
