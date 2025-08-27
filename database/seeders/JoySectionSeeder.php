<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JoySectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🎉 إنشاء بيانات قسم فرحي...');

        // مشغلي الدي جي
        $djPerformers = [
            [
                'name' => 'أحمد الموسيقى',
                'specialty' => 'دي جي حفلات الزفاف',
                'phone_numbers' => json_encode(['+201001234567']),
                'email' => 'ahmed@dj.com',
                'description' => 'خبير في موسيقى حفلات الزفاف مع خبرة 8 سنوات',
                'website_url' => 'https://ahmed-dj.com',
                'instagram_url' => 'https://instagram.com/ahmed-dj',
                'facebook_url' => 'https://facebook.com/ahmed-dj',
                'starting_price' => 2500,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سارة الصوت',
                'specialty' => 'دي جي حفلات النساء',
                'phone_numbers' => json_encode(['+201007654321']),
                'email' => 'sara@dj.com',
                'description' => 'متخصصة في موسيقى حفلات النساء والمناسبات الخاصة',
                'website_url' => 'https://sara-dj.com',
                'instagram_url' => 'https://instagram.com/sara-dj',
                'facebook_url' => 'https://facebook.com/sara-dj',
                'starting_price' => 2000,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djPerformers as $dj) {
            DB::table('dj_performers')->updateOrInsert(
                ['name' => $dj['name']],
                $dj
            );
        }

        // باقات الدي جي
        $djPackages = [
            [
                'dj_performer_id' => 1,
                'package_name' => 'الباقة الأساسية',
                'package_description' => '3 ساعات من الموسيقى مع المعدات الأساسية',
                'price' => 6000,
                'duration_hours' => 3,
                'includes' => json_encode(['معدات صوت أساسية', 'قائمة موسيقى متنوعة', 'ميكروفون']),
                'is_popular' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dj_performer_id' => 1,
                'package_name' => 'الباقة المميزة',
                'package_description' => '5 ساعات مع معدات متقدمة وإضاءة',
                'price' => 10000,
                'duration_hours' => 5,
                'includes' => json_encode(['معدات صوت متقدمة', 'إضاءة ملونة', 'ميكروفون لاسلكي', 'قائمة موسيقى مخصصة']),
                'is_popular' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djPackages as $package) {
            DB::table('dj_wedding_packages')->updateOrInsert(
                ['package_name' => $package['package_name'], 'dj_performer_id' => $package['dj_performer_id']],
                $package
            );
        }

        // لافتات الدي جي
        $djBanners = [
            [
                'dj_performer_id' => 1,
                'title' => 'أحمد الموسيقى - حفلات الزفاف',
                'banner_image' => '/images/dj-banner-1.jpg',
                'link_url' => 'https://ahmed-dj.com',
                'offer_description' => 'خصم 20% على باقات حفلات الزفاف',
                'valid_until' => '2024-12-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dj_performer_id' => 2,
                'title' => 'سارة الصوت - حفلات النساء',
                'banner_image' => '/images/dj-banner-2.jpg',
                'link_url' => 'https://sara-dj.com',
                'offer_description' => 'باقات خاصة لحفلات النساء',
                'valid_until' => '2024-12-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djBanners as $banner) {
            DB::table('dj_banners')->updateOrInsert(
                ['title' => $banner['title']],
                $banner
            );
        }

        // فيديوهات إعلانات الدي جي
        $djVideoAds = [
            [
                'dj_performer_id' => 1,
                'title' => 'أحمد الموسيقى - عرض خاص',
                'video_url' => 'https://www.youtube.com/watch?v=ahmed-dj',
                'description' => 'شاهد أحمد الموسيقى في أحد حفلات الزفاف',
                'skip_after_seconds' => 5,
                'is_sponsored' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dj_performer_id' => 2,
                'title' => 'سارة الصوت - حفلات النساء',
                'video_url' => 'https://www.youtube.com/watch?v=sara-dj',
                'description' => 'تعرفي على سارة الصوت في حفلات النساء',
                'skip_after_seconds' => 5,
                'is_sponsored' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djVideoAds as $video) {
            DB::table('dj_video_ads')->updateOrInsert(
                ['title' => $video['title']],
                $video
            );
        }

        $this->command->info('✅ تم إنشاء بيانات قسم فرحي بنجاح! 🎉');
    }
}
