<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🚀 بدء إنشاء جميع البيانات...');

        // تشغيل الـ seeder الشامل
        $this->call([
            CompleteDataSeeder::class,
        ]);

        $this->command->info('✅ تم إنشاء جميع البيانات بنجاح! 🎉');
    }
}
