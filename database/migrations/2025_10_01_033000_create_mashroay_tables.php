<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('project_ideas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category')->nullable();
            $table->string('budget_range')->nullable();
            $table->text('target_audience')->nullable();
            $table->text('key_features')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('business_advice', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('category')->nullable();
            $table->string('author')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('business_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->text('description');
            $table->text('steps')->nullable();
            $table->string('category')->nullable();
            $table->string('template_file')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('funding_options', function (Blueprint $table) {
            $table->id();
            $table->string('funding_type');
            $table->text('description');
            $table->string('provider_name')->nullable();
            $table->string('funding_range')->nullable();
            $table->text('requirements')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('website_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('business_resources', function (Blueprint $table) {
            $table->id();
            $table->string('resource_name');
            $table->text('description');
            $table->string('resource_type');
            $table->string('category')->nullable();
            $table->string('resource_url')->nullable();
            $table->boolean('is_free')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('mashroay_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner_image');
            $table->string('link_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('mashroay_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('mashroay_videos');
        Schema::dropIfExists('mashroay_banners');
        Schema::dropIfExists('business_resources');
        Schema::dropIfExists('funding_options');
        Schema::dropIfExists('business_plans');
        Schema::dropIfExists('business_advice');
        Schema::dropIfExists('project_ideas');
    }
};
