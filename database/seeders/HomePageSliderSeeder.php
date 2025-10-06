<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForasyBanner;
use App\Models\SponsorBanner;
use Illuminate\Support\Facades\DB;

class HomePageSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة أولاً
        DB::table('forasy_banners')->truncate();
        DB::table('sponsor_banners')->truncate();

        // إضافة بيانات Forasy Banner للـ slider الرئيسي
        $forasyBanners = [
            [
                'title' => 'وظائف حرة للنساء',
                'main_title' => 'ابدئي مسيرتك المهنية اليوم',
                'subtitle' => 'اكتشفي أفضل الوظائف الحرة المناسبة لكِ',
                'banner_image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
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
                'banner_image' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
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
                'banner_image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
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
                'banner_image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
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
                'banner_image' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=2069&q=80',
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

        // إضافة بيانات Sponsor Banner للـ slider الثانوي
        $sponsorBanners = [
            [
                'title' => 'شركاء النجاح',
                'main_title' => 'مع شركائنا نحو التميز',
                'subtitle' => 'اكتشفي خدمات شركائنا المميزة',
                'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=2126&q=80',
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
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2015&q=80',
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
                'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
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
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
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

        $this->command->info('تم إضافة بيانات الـ slider بنجاح!');
        $this->command->info('عدد Forasy Banners: ' . count($forasyBanners));
        $this->command->info('عدد Sponsor Banners: ' . count($sponsorBanners));
    }
}
