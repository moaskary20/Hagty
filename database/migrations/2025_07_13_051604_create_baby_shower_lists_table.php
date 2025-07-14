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
        Schema::create('baby_shower_lists', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->comment('اسم العنصر');
            $table->text('description')->comment('وصف العنصر');
            $table->string('category')->comment('الفئة (ملابس، ألعاب، إلخ)');
            $table->string('priority')->default('متوسط')->comment('الأولوية');
            $table->decimal('estimated_price', 8, 2)->nullable()->comment('السعر المتوقع');
            $table->string('recommended_brand')->nullable()->comment('الماركة المنصوح بها');
            $table->integer('quantity')->default(1)->comment('الكمية');
            $table->string('size_info')->nullable()->comment('معلومات المقاس');
            $table->string('age_suitability')->comment('الملائمة العمرية');
            $table->string('image')->nullable()->comment('صورة العنصر');
            $table->json('features')->nullable()->comment('المميزات');
            $table->json('buying_tips')->nullable()->comment('نصائح الشراء');
            $table->string('season')->nullable()->comment('الموسم المناسب');
            $table->boolean('is_essential')->default(false)->comment('ضروري');
            $table->boolean('is_luxury')->default(false)->comment('كمالي');
            $table->boolean('is_active')->default(true)->comment('نشط');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_shower_lists');
    }
};
