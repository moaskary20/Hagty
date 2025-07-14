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
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name'); // اسم جهة الاتصال
            $table->string('relationship'); // العلاقة (أب، أم، جد، إلخ)
            $table->string('phone'); // رقم الهاتف
            $table->string('emergency_phone')->nullable(); // رقم الطوارئ
            $table->text('address')->nullable(); // العنوان
            $table->boolean('is_primary')->default(false); // جهة الاتصال الأساسية
            $table->text('notes')->nullable(); // ملاحظات
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_contacts');
    }
};
