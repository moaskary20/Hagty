<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForasyBanner;

class ForasyBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة
        ForasyBanner::truncate();

        // إضافة بانرات السلايدر الرئيسي
        $banners = [
            [
                'job_id' => null,
                'title' => 'مرحباً بك في HAGTY',
                'banner_image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80',
                'link_url' => '#about',
                'description' => 'منصة شاملة للمرأة العربية',
                'offer_description' => 'كل ما تحتاجينه في مكان واحد',
                'valid_until' => now()->addMonth(),
                'display_order' => 1,
                'is_active' => true,
                'main_title' => 'مرحباً بك في HAGTY',
                'subtitle' => 'منصة شاملة للمرأة العربية - كل ما تحتاجينه في مكان واحد',
                'button_text' => 'اكتشفي المزيد',
                'button_url' => '#about',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#d94288',
                'show_overlay' => true,
            ],
            [
                'job_id' => null,
                'title' => 'كورسات تعليمية احترافية',
                'banner_image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'link_url' => '/accessoraty',
                'description' => 'تعلمي من أفضل المدربين',
                'offer_description' => 'مجالات التجميل والموضة والتصميم',
                'valid_until' => now()->addMonth(),
                'display_order' => 2,
                'is_active' => true,
                'main_title' => 'كورسات تعليمية احترافية',
                'subtitle' => 'تعلمي من أفضل المدربين في مجالات التجميل والموضة والتصميم',
                'button_text' => 'ابدئي التعلم',
                'button_url' => '/accessoraty',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#d94288',
                'show_overlay' => true,
            ],
            [
                'job_id' => null,
                'title' => 'رعاية صحية شاملة',
                'banner_image' => 'https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'link_url' => '/health',
                'description' => 'اطبيبة متخصصات ونصائح صحية',
                'offer_description' => 'لصحة أفضل',
                'valid_until' => now()->addMonth(),
                'display_order' => 3,
                'is_active' => true,
                'main_title' => 'رعاية صحية شاملة',
                'subtitle' => 'اطبيبة متخصصات ونصائح صحية لصحة أفضل',
                'button_text' => 'احجزي موعد',
                'button_url' => '/health',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#d94288',
                'show_overlay' => true,
            ],
        ];

        foreach ($banners as $banner) {
            ForasyBanner::create($banner);
        }

        $this->command->info('✅ تم إضافة ' . count($banners) . ' بانر للسلايدر الرئيسي بنجاح!');
    }
}