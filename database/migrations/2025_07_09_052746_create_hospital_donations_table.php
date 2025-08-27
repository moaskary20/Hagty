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
        Schema::create('hospital_donations', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name'); // اسم المستشفى
            $table->text('description')->nullable(); // وصف المستشفى أو سبب التبرع
            $table->string('donation_link')->nullable(); // رابط التبرع
            $table->string('image')->nullable(); // صورة أو شعار المستشفى
            $table->string('donation_account_number')->nullable(); // رقم حساب التبرع
            $table->string('donation_phone')->nullable(); // رقم هاتف التبرع
            $table->string('bank_name')->nullable(); // اسم البنك
            $table->text('donation_methods')->nullable(); // طرق التبرع المختلفة
            $table->enum('status', ['active', 'inactive'])->default('active'); // حالة التبرع
            $table->decimal('target_amount', 10, 2)->nullable(); // المبلغ المستهدف
            $table->decimal('collected_amount', 10, 2)->default(0); // المبلغ المجمع
            $table->date('campaign_end_date')->nullable(); // تاريخ انتهاء الحملة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_donations');
    }
};
