<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForasyBanner;
use App\Models\SponsorBanner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LocalSliderImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء مجلد الصور إذا لم يكن موجوداً
        if (!Storage::exists('public/slider-images')) {
            Storage::makeDirectory('public/slider-images');
        }

        // حذف البيانات الموجودة أولاً
        DB::table('forasy_banners')->truncate();
        DB::table('sponsor_banners')->truncate();

        // إضافة بيانات Forasy Banner مع صور محلية
        $forasyBanners = [
            [
                'title' => 'وظائف حرة للنساء',
                'main_title' => 'ابدئي مسيرتك المهنية اليوم',
                'subtitle' => 'اكتشفي أفضل الوظائف الحرة المناسبة لكِ',
                'banner_image' => 'slider-images/women-career.jpg',
                'description' => 'منصة متخصصة في تقديم أفضل الفرص الوظيفية للنساء',
                'offer_description' => 'عرض خاص: اشتراك مجاني لمدة 3 أشهر',
                'valid_until' => now()->addMonths(3),
                'button_text' => 'ابدئي الآن',
                'button_url' => '/forasy',
                'link_url' => '/forasy',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#A15DBF',
                'show_overlay' => true,
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'مشاريع ناجحة',
                'main_title' => 'حقق أحلامك التجارية',
                'subtitle' => 'ابدئي مشروعك الخاص مع دعم كامل من خبرائنا',
                'banner_image' => 'slider-images/business-success.jpg',
                'description' => 'دعم شامل لبدء المشاريع النسائية الناجحة',
                'offer_description' => 'استشارة مجانية مع خبراء الأعمال',
                'valid_until' => now()->addMonths(6),
                'button_text' => 'ابدئي مشروعك',
                'button_url' => '/mashroay',
                'link_url' => '/mashroay',
                'text_position' => 'right',
                'text_color' => '#ffffff',
                'button_color' => '#D94288',
                'show_overlay' => true,
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'ريادة الأعمال',
                'main_title' => 'كوني رائدة أعمال',
                'subtitle' => 'تعلمي مهارات القيادة وإدارة الأعمال',
                'banner_image' => 'slider-images/leadership.jpg',
                'description' => 'برامج تدريبية متخصصة لتطوير مهارات القيادة',
                'offer_description' => 'شهادة معتمدة في ريادة الأعمال',
                'valid_until' => now()->addMonths(12),
                'button_text' => 'انضمي إلينا',
                'button_url' => '/leadership',
                'link_url' => '/leadership',
                'text_position' => 'left',
                'text_color' => '#ffffff',
                'button_color' => '#8B4A9C',
                'show_overlay' => true,
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'التسوق الذكي',
                'main_title' => 'تسوقي بذكاء',
                'subtitle' => 'اكتشفي أفضل العروض والنصائح للتسوق',
                'banner_image' => 'slider-images/smart-shopping.jpg',
                'description' => 'دليل شامل للتسوق الذكي والعروض المميزة',
                'offer_description' => 'خصم 20% على جميع المنتجات',
                'valid_until' => now()->addDays(30),
                'button_text' => 'تسوقي الآن',
                'button_url' => '/shopping',
                'link_url' => '/shopping',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#B17DC0',
                'show_overlay' => true,
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'الرعاية الصحية',
                'main_title' => 'صحتك أولويتنا',
                'subtitle' => 'خدمات طبية متخصصة للنساء',
                'banner_image' => 'slider-images/healthcare.jpg',
                'description' => 'رعاية صحية شاملة ومتخصصة للنساء',
                'offer_description' => 'فحص طبي مجاني',
                'valid_until' => now()->addMonths(2),
                'button_text' => 'احجزي موعد',
                'button_url' => '/health',
                'link_url' => '/health',
                'text_position' => 'right',
                'text_color' => '#ffffff',
                'button_color' => '#753880',
                'show_overlay' => true,
                'display_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($forasyBanners as $banner) {
            ForasyBanner::create($banner);
        }

        // إضافة بيانات Sponsor Banner مع صور محلية
        $sponsorBanners = [
            [
                'title' => 'شركاء النجاح',
                'main_title' => 'مع شركائنا نحو التميز',
                'subtitle' => 'اكتشفي خدمات شركائنا المميزة',
                'image' => 'slider-images/partnership.jpg',
                'link_url' => '/partners',
                'button_text' => 'اكتشفي المزيد',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#A15DBF',
                'show_overlay' => true,
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'عروض مميزة',
                'main_title' => 'عروض لا تفوتيها',
                'subtitle' => 'خصومات وعروض حصرية لكِ',
                'image' => 'slider-images/special-offers.jpg',
                'link_url' => '/offers',
                'button_text' => 'شوفي العروض',
                'text_position' => 'left',
                'text_color' => '#ffffff',
                'button_color' => '#D94288',
                'show_overlay' => true,
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'أحداث قادمة',
                'main_title' => 'انضمي لحدثنا القادم',
                'subtitle' => 'فعاليات وورش عمل مميزة',
                'image' => 'slider-images/upcoming-events.jpg',
                'link_url' => '/events',
                'button_text' => 'سجلي الآن',
                'text_position' => 'right',
                'text_color' => '#ffffff',
                'button_color' => '#8B4A9C',
                'show_overlay' => true,
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'مجتمع HAGTY',
                'main_title' => 'كوني جزءاً من مجتمعنا',
                'subtitle' => 'تفاعلي مع آلاف النساء الملهمات',
                'image' => 'slider-images/community.jpg',
                'link_url' => '/community',
                'button_text' => 'انضمي الآن',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#B17DC0',
                'show_overlay' => true,
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'display_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($sponsorBanners as $banner) {
            SponsorBanner::create($banner);
        }

        $this->command->info('تم إضافة بيانات الـ slider مع صور محلية بنجاح!');
        $this->command->info('عدد Forasy Banners: ' . count($forasyBanners));
        $this->command->info('عدد Sponsor Banners: ' . count($sponsorBanners));
        $this->command->info('تأكد من إضافة الصور في مجلد: storage/app/public/slider-images/');
    }
}
