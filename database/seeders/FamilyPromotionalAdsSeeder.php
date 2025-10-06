<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FamilyPromotionalAdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🎯 إضافة الإعلانات الدعائية لقسم العائلة...');

        $promotionalAds = [
            [
                'title' => 'عرض خاص على مطاعم العائلة',
                'description' => 'احصلي على خصم 30% على جميع وجبات العائلة في أفضل المطاعم. عروض حصرية للعائلات مع أطفال.',
                'image_url' => '/images/family-restaurants.jpg',
                'link_url' => '#',
                'ad_type' => 'image',
                'category' => 'food',
                'price' => 299.99,
                'discount_percentage' => '30%',
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'is_featured' => true,
                'is_active' => true,
                'display_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلة عائلية إلى حديقة الحيوانات',
                'description' => 'استمتعي برحلة عائلية مميزة إلى حديقة الحيوانات مع خصم 25% على التذاكر. أنشطة ترفيهية للأطفال.',
                'image_url' => '/images/family-zoo-trip.jpg',
                'link_url' => '#',
                'ad_type' => 'image',
                'category' => 'entertainment',
                'price' => 150.00,
                'discount_percentage' => '25%',
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'is_featured' => false,
                'is_active' => true,
                'display_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'دورات تعليمية للأطفال',
                'description' => 'دورات تعليمية متنوعة للأطفال في الرياضيات والعلوم واللغات. أساتذة متخصصون وطرق تعليمية حديثة.',
                'image_url' => '/images/kids-education.jpg',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'link_url' => '#',
                'ad_type' => 'video',
                'category' => 'education',
                'price' => 500.00,
                'discount_percentage' => '20%',
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'is_featured' => true,
                'is_active' => true,
                'display_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'خدمات طبية للعائلة',
                'description' => 'خدمات طبية شاملة للعائلة مع أطباء متخصصين. فحوصات دورية وعلاج للأطفال والكبار.',
                'image_url' => '/images/family-health.jpg',
                'link_url' => '#',
                'ad_type' => 'banner',
                'category' => 'health',
                'price' => 200.00,
                'discount_percentage' => '15%',
                'start_date' => now(),
                'end_date' => now()->addMonths(12),
                'is_featured' => false,
                'is_active' => true,
                'display_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'تسوق عائلي في مول جديد',
                'description' => 'اكتشفي أحدث المولات مع عروض تسوق حصرية للعائلات. ملابس وألعاب وأجهزة إلكترونية بأسعار منافسة.',
                'image_url' => '/images/family-shopping.jpg',
                'link_url' => '#',
                'ad_type' => 'image',
                'category' => 'shopping',
                'price' => 1000.00,
                'discount_percentage' => '40%',
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
                'is_featured' => true,
                'is_active' => true,
                'display_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلات عائلية داخلية',
                'description' => 'رحلات عائلية داخلية إلى أجمل الوجهات في مصر. فنادق مناسبة للعائلات وأنشطة للأطفال.',
                'image_url' => '/images/family-travel.jpg',
                'link_url' => '#',
                'ad_type' => 'image',
                'category' => 'travel',
                'price' => 2500.00,
                'discount_percentage' => '35%',
                'start_date' => now(),
                'end_date' => now()->addMonths(4),
                'is_featured' => false,
                'is_active' => true,
                'display_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'خدمات منزلية للعائلة',
                'description' => 'خدمات منزلية شاملة من تنظيف وطهي وترتيب. فريق محترف وموثوق لراحة العائلة.',
                'image_url' => '/images/family-services.jpg',
                'link_url' => '#',
                'ad_type' => 'image',
                'category' => 'services',
                'price' => 300.00,
                'discount_percentage' => '10%',
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'is_featured' => false,
                'is_active' => true,
                'display_order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'ألعاب تعليمية للأطفال',
                'description' => 'مجموعة متنوعة من الألعاب التعليمية والترفيهية للأطفال. تساعد في تنمية المهارات والإبداع.',
                'image_url' => '/images/kids-games.jpg',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'link_url' => '#',
                'ad_type' => 'video',
                'category' => 'education',
                'price' => 150.00,
                'discount_percentage' => '25%',
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'is_featured' => true,
                'is_active' => true,
                'display_order' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($promotionalAds as $ad) {
            DB::table('family_promotional_ads')->updateOrInsert(
                ['title' => $ad['title']],
                $ad
            );
        }

        $this->command->info('✅ تم إضافة الإعلانات الدعائية بنجاح! 🎉');
    }
}