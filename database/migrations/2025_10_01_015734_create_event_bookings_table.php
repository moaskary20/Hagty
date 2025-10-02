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
        Schema::create('event_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // معرف الفعالية
            $table->string('customer_name'); // اسم العميل
            $table->string('customer_email'); // بريد العميل
            $table->string('customer_phone'); // هاتف العميل
            $table->integer('number_of_tickets')->default(1); // عدد التذاكر
            $table->decimal('total_amount', 10, 2); // المبلغ الإجمالي
            $table->string('booking_status')->default('pending'); // حالة الحجز (pending, confirmed, cancelled)
            $table->string('payment_status')->default('pending'); // حالة الدفع (pending, paid, refunded)
            $table->text('special_requests')->nullable(); // طلبات خاصة
            $table->string('booking_reference')->unique(); // رقم مرجعي للحجز
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_bookings');
    }
};
