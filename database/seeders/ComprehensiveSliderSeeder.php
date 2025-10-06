<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForasyBanner;
use App\Models\SponsorBanner;
use Illuminate\Support\Facades\DB;

class ComprehensiveSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة أولاً
        DB::table('forasy_banners')->truncate();
        DB::table('sponsor_banners')->truncate();

        // إضافة بيانات Forasy Banner شاملة ومتنوعة
        $forasyBanners = [
            [
                'title' => 'وظائف حرة للنساء',
                'main_title' => 'ابدئي مسيرتك المهنية اليوم',
                'subtitle' => 'اكتشفي أفضل الوظائف الحرة المناسبة لكِ',
                'banner_image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
                'description' => 'منصة متخصصة في تقديم أفضل الفرص الوظيفية للنساء مع دعم كامل',
                'offer_description' => 'عرض خاص: اشتراك مجاني لمدة 3 أشهر + استشارة مهنية مجانية',
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
                'description' => 'دعم شامل لبدء المشاريع النسائية الناجحة مع تمويل ومساعدة',
                'offer_description' => 'استشارة مجانية مع خبراء الأعمال + خطة عمل مفصلة',
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
                'description' => 'برامج تدريبية متخصصة لتطوير مهارات القيادة والأعمال',
                'offer_description' => 'شهادة معتمدة في ريادة الأعمال + mentorship شخصي',
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
                'offer_description' => 'خصم 20% على جميع المنتجات + توصيل مجاني',
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
                'description' => 'رعاية صحية شاملة ومتخصصة للنساء مع أفضل الأطباء',
                'offer_description' => 'فحص طبي مجاني + استشارة أونلاين',
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
            [
                'title' => 'التعليم والتطوير',
                'main_title' => 'طوري مهاراتك',
                'subtitle' => 'دورات تدريبية متخصصة للنساء',
                'banner_image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
                'description' => 'دورات تدريبية في مختلف المجالات لتطوير مهاراتك المهنية',
                'offer_description' => 'دورة مجانية + شهادة معتمدة',
                'valid_until' => now()->addMonths(4),
                'button_text' => 'ابدئي التعلم',
                'button_url' => '/education',
                'link_url' => '/education',
                'text_position' => 'center',
                'text_color' => '#ffffff',
                'button_color' => '#A15DBF',
                'show_overlay' => true,
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'الموضة والأزياء',
                'main_title' => 'كوني أنيقة',
                'subtitle' => 'أحدث صيحات الموضة والأزياء',
                'banner_image' => 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'description' => 'اكتشفي أحدث صيحات الموضة ونصائح الأزياء',
                'offer_description' => 'خصم 30% على جميع الأزياء + استشارة أزياء مجانية',
                'valid_until' => now()->addDays(45),
                'button_text' => 'اكتشفي الأزياء',
                'button_url' => '/fashion',
                'link_url' => '/fashion',
                'text_position' => 'left',
                'text_color' => '#ffffff',
                'button_color' => '#D94288',
                'show_overlay' => true,
                'display_order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'اللياقة البدنية',
                'main_title' => 'كوني قوية',
                'subtitle' => 'برامج لياقة بدنية متخصصة للنساء',
                'banner_image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'description' => 'برامج تمارين ولياقة بدنية مصممة خصيصاً للنساء',
                'offer_description' => 'جلسة تجريبية مجانية + خطة غذائية',
                'valid_until' => now()->addMonths(3),
                'button_text' => 'ابدئي التمرين',
                'button_url' => '/fitness',
                'link_url' => '/fitness',
                'text_position' => 'right',
                'text_color' => '#ffffff',
                'button_color' => '#8B4A9C',
                'show_overlay' => true,
                'display_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($forasyBanners as $banner) {
            ForasyBanner::create($banner);
        }

        // إضافة بيانات Sponsor Banner شاملة
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
            [
                'title' => 'خدمات مالية',
                'main_title' => 'ادخاري بذكاء',
                'subtitle' => 'خدمات مالية متخصصة للنساء',
                'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
                'link_url' => '/finance',
                'button_text' => 'ابدئي الادخار',
                'text_position' => 'left',
                'text_color' => '#ffffff',
                'button_color' => '#753880',
                'show_overlay' => true,
                'start_date' => now(),
                'end_date' => now()->addMonths(8),
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'السياحة والسفر',
                'main_title' => 'اكتشفي العالم',
                'subtitle' => 'رحلات سياحية مخصصة للنساء',
                'image' => 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&auto=format&fit=crop&w=2026&q=80',
                'link_url' => '/travel',
                'button_text' => 'احجزي رحلتك',
                'text_position' => 'right',
                'text_color' => '#ffffff',
                'button_color' => '#A15DBF',
                'show_overlay' => true,
                'start_date' => now(),
                'end_date' => now()->addMonths(10),
                'display_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($sponsorBanners as $banner) {
            SponsorBanner::create($banner);
        }

        $this->command->info('تم إضافة بيانات الـ slider الشاملة بنجاح!');
        $this->command->info('عدد Forasy Banners: ' . count($forasyBanners));
        $this->command->info('عدد Sponsor Banners: ' . count($sponsorBanners));
        $this->command->info('جميع البيانات تحتوي على ألوان متنوعة وتنسيقات مختلفة');
    }
}
