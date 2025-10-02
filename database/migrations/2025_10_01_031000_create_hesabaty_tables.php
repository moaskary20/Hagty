<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('source');
            $table->decimal('amount', 12, 2);
            $table->string('frequency')->default('monthly');
            $table->date('income_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
        
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('category');
            $table->string('description');
            $table->decimal('amount', 12, 2);
            $table->date('expense_date');
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
        
        Schema::create('savings_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('goal_name');
            $table->text('description')->nullable();
            $table->decimal('target_amount', 12, 2);
            $table->decimal('current_amount', 12, 2)->default(0);
            $table->date('target_date')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
        
        Schema::create('bill_reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('bill_name');
            $table->decimal('amount', 12, 2);
            $table->date('due_date');
            $table->string('frequency')->default('monthly');
            $table->boolean('is_paid')->default(false);
            $table->boolean('notify_before_days')->default(3);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
        
        Schema::create('hesabaty_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner_image');
            $table->string('link_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('hesabaty_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('hesabaty_videos');
        Schema::dropIfExists('hesabaty_banners');
        Schema::dropIfExists('bill_reminders');
        Schema::dropIfExists('savings_goals');
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('incomes');
    }
};
