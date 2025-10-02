<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('health_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('consultant_name');
            $table->string('specialty');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->decimal('consultation_fee', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('career_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('consultant_name');
            $table->string('expertise_area');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->decimal('consultation_fee', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('family_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('consultant_name');
            $table->string('specialty');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->decimal('consultation_fee', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('business_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('consultant_name');
            $table->string('expertise_area');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->decimal('consultation_fee', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('psychological_support', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('specialist_name');
            $table->string('specialty');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->decimal('session_fee', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('mostashary_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner_image');
            $table->string('link_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('mostashary_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('mostashary_videos');
        Schema::dropIfExists('mostashary_banners');
        Schema::dropIfExists('psychological_support');
        Schema::dropIfExists('business_consultations');
        Schema::dropIfExists('family_consultations');
        Schema::dropIfExists('career_consultations');
        Schema::dropIfExists('health_consultations');
    }
};
