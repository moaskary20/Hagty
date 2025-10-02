<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SponsorBanner;

class SponsorBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة
        SponsorBanner::truncate();

        // إضافة صور عالية الجودة للشركاء مع النصوص
        $banners = [
            [
                'title' => 'Apple',
                'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=1200&h=600&fit=crop&crop=center',
                'link_url' => 'https://apple.com',
                'start_date' => now()->subDay(),
                'end_date' => now()->addMonth(),
                'display_order' => 1,
                'is_active' => true,
                'main_title' => 'Apple',
                'subtitle' => 'اكتشفي أحدث منتجات Apple المبتكرة',
                'button_text' => 'تسوقي الآن',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#d94288',
                'show_overlay' => true,
            ],
            [
                'title' => 'Samsung',
                'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=1200&h=600&fit=crop&crop=center',
                'link_url' => 'https://samsung.com',
                'start_date' => now()->subDay(),
                'end_date' => now()->addMonth(),
                'display_order' => 2,
                'is_active' => true,
                'main_title' => 'Samsung',
                'subtitle' => 'تقنيات متطورة لحياة أفضل',
                'button_text' => 'اكتشفي المزيد',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#d94288',
                'show_overlay' => true,
            ],
            [
                'title' => 'Microsoft',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1200&h=600&fit=crop&crop=center',
                'link_url' => 'https://microsoft.com',
                'start_date' => now()->subDay(),
                'end_date' => now()->addMonth(),
                'display_order' => 3,
                'is_active' => true,
                'main_title' => 'Microsoft',
                'subtitle' => 'حلول تقنية للعمل والإبداع',
                'button_text' => 'تعرفي على المنتجات',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#d94288',
                'show_overlay' => true,
            ],
            [
                'title' => 'Google',
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=1200&h=600&fit=crop&crop=center',
                'link_url' => 'https://google.com',
                'start_date' => now()->subDay(),
                'end_date' => now()->addMonth(),
                'display_order' => 4,
                'is_active' => true,
                'main_title' => 'Google',
                'subtitle' => 'خدمات رقمية ذكية ومبتكرة',
                'button_text' => 'استكشفي الخدمات',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#d94288',
                'show_overlay' => true,
            ],
            [
                'title' => 'Amazon',
                'image' => 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=1200&h=600&fit=crop&crop=center',
                'link_url' => 'https://amazon.com',
                'start_date' => now()->subDay(),
                'end_date' => now()->addMonth(),
                'display_order' => 5,
                'is_active' => true,
                'main_title' => 'Amazon',
                'subtitle' => 'تسوقي آمن وسريع من كل مكان',
                'button_text' => 'ابدئي التسوق',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#d94288',
                'show_overlay' => true,
            ],
        ];

        foreach ($banners as $banner) {
            SponsorBanner::create($banner);
        }

        $this->command->info('✅ تم إضافة ' . count($banners) . ' صورة عالية الجودة للشركاء بنجاح!');
    }
}
