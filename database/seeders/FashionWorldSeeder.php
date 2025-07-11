<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MainScreenElement;
use App\Models\FashionShop;
use App\Models\ModaTip;
use App\Models\Designer;
use App\Models\Tailor;
use App\Models\FashionistaVideo;

class FashionWorldSeeder extends Seeder
{
    public function run(): void
    {
        // عناصر الشاشة الرئيسية (مطابقة للأعمدة الفعلية فقط)
        \App\Models\MainScreenElement::insert([
            [
                'نوع' => 'بانر_إعلاني',
                'صورة_الشعار' => 'banner1.jpg',
                'اسم_الراعي' => 'راعي الموضة',
                'رابط_الراعي' => 'https://sponsor.com',
                'صورة_البانر' => 'banner1.jpg',
                'رابط_الإعلان' => 'https://ad.moda.com',
                'عنوان_الإعلان' => 'عرض صيف الموضة',
                'حالة_التفعيل' => true,
                'رابط_الفيديو' => 'https://youtube.com/banner1',
                'مدة_التخطي' => 6,
                'عنوان_العرض' => 'خصم خاص',
                'وصف_العرض' => 'خصم 50% على جميع المنتجات',
                'صورة_العرض' => 'offer1.jpg',
                'رابط_المتجر' => 'https://moda.com/offer',
                'تاريخ_الانتهاء' => '2025-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'نوع' => 'شعار_راعي',
                'صورة_الشعار' => 'logo2.jpg',
                'اسم_الراعي' => 'راعي ستايل',
                'رابط_الراعي' => 'https://sponsor2.com',
                'صورة_البانر' => null,
                'رابط_الإعلان' => null,
                'عنوان_الإعلان' => null,
                'حالة_التفعيل' => false,
                'رابط_الفيديو' => null,
                'مدة_التخطي' => null,
                'عنوان_العرض' => null,
                'وصف_العرض' => null,
                'صورة_العرض' => null,
                'رابط_المتجر' => null,
                'تاريخ_الانتهاء' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // دليل متاجر الموضة
        \App\Models\FashionShop::insert([
            [
                'اسم_المتجر' => 'متجر الأناقة',
                'العنوان' => 'القاهرة',
                'رابط_الخريطة' => 'https://maps.com/shop1',
                'رابط_المتجر' => 'https://shop.moda.com',
                'رقم_الهاتف' => '01000000000',
                'شعار_المتجر' => 'shop.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'اسم_المتجر' => 'ستايل شوب',
                'العنوان' => 'الإسكندرية',
                'رابط_الخريطة' => 'https://maps.com/shop2',
                'رابط_المتجر' => 'https://style.com',
                'رقم_الهاتف' => '01011111111',
                'شعار_المتجر' => 'style.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // نصائح الموضة من البلوجرز
        \App\Models\ModaTip::insert([
            [
                'عنوان_النصيحة' => 'اختاري الألوان الفاتحة في الصيف',
                'رابط_الفيديو' => 'https://youtube.com/tip1',
                'اسم_البلوجر' => 'سارة ستايل',
                'حالة_الرعاية' => true,
                'مدة_التخطي' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'عنوان_النصيحة' => 'الملابس الواسعة موضة هذا العام',
                'رابط_الفيديو' => 'https://youtube.com/tip2',
                'اسم_البلوجر' => 'نور فاشن',
                'حالة_الرعاية' => false,
                'مدة_التخطي' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // دليل المصممين
        \App\Models\Designer::insert([
            [
                'اسم_المصمم' => 'أحمد فاشن',
                'الموقع' => 'https://designer.com/ahmed',
                'معرض_الأعمال' => 'ahmed-works.jpg',
                'رابط_الفيديو_القصير' => 'https://youtube.com/ahmedshort',
                'رابط_الدورات' => 'https://designer.com/ahmed/courses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'اسم_المصمم' => 'منى ديزاين',
                'الموقع' => 'https://designer.com/mona',
                'معرض_الأعمال' => 'mona-works.jpg',
                'رابط_الفيديو_القصير' => 'https://youtube.com/monashort',
                'رابط_الدورات' => 'https://designer.com/mona/courses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // دليل الترزية
        \App\Models\Tailor::insert([
            [
                'اسم_الترزي' => 'ورشة التفصيل',
                'الموقع' => 'https://tailor.com/workshop',
                'رابط_الخريطة' => 'https://maps.com/tailor1',
                'نصائح_الخياطة' => 'استخدم خيوط قوية للملابس الشتوية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'اسم_الترزي' => 'خياط المدينة',
                'الموقع' => 'https://tailor.com/city',
                'رابط_الخريطة' => 'https://maps.com/tailor2',
                'نصائح_الخياطة' => 'تأكد من قياس الزبون بدقة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // دليل الفيديوهات البلوجرز
        \App\Models\FashionistaVideo::insert([
            [
                'عنوان_الفيديو' => 'أحدث صيحات الموضة 2025',
                'رابط_الفيديو' => 'https://youtube.com/nourfashion',
                'اسم_البلوجر' => 'نور فاشن',
                'التصنيف' => 'موضة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'عنوان_الفيديو' => 'نصائح تنسيق الألوان',
                'رابط_الفيديو' => 'https://youtube.com/sarastyle',
                'اسم_البلوجر' => 'سارة ستايل',
                'التصنيف' => 'نصائح',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
