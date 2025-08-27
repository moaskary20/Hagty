<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FashionCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🎨 إنشاء فئات الموضة...');

        $categories = [
            [
                'name' => 'الألوان',
                'description' => 'أحدث ألوان الموضة والتجميل',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'الشعر',
                'description' => 'قصات وتصفيفات الشعر العصرية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'التجميل',
                'description' => 'تقنيات المكياج والعناية بالبشرة',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($categories as $category) {
            DB::table('fashion_trend_categories')->updateOrInsert(
                ['name' => $category['name']],
                $category
            );
        }

        $this->command->info('✅ تم إنشاء فئات الموضة بنجاح! 🎉');
    }
}
