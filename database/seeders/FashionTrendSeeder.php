<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FashionTrend;

class FashionTrendSeeder extends Seeder
{
    public function run(): void
    {
        FashionTrend::insert([
            [
                'العنوان' => 'أحدث صيحات الإكسسوارات لصيف 2025',
                'الوصف' => 'تعرف على أبرز صيحات الإكسسوارات لهذا الموسم.',
                'الصورة' => 'trend1.jpg',
                'النوع' => 'مدونة',
                'رابط_الفيديو' => null,
                'حالة_التفعيل' => true,
                'تاريخ_النشر' => '2025-07-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'العنوان' => 'نصيحة: كيف تختار الإكسسوار المناسب؟',
                'الوصف' => 'دليلك لاختيار الإكسسوار المناسب لكل مناسبة.',
                'الصورة' => 'trend2.jpg',
                'النوع' => 'نصيحة',
                'رابط_الفيديو' => null,
                'حالة_التفعيل' => true,
                'تاريخ_النشر' => '2025-07-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'العنوان' => 'فيديو: تنسيقات إكسسوارات عصرية',
                'الوصف' => 'شاهد فيديو لأحدث التنسيقات.',
                'الصورة' => 'trend3.jpg',
                'النوع' => 'فيديو',
                'رابط_الفيديو' => 'https://youtube.com/fashiontrend',
                'حالة_التفعيل' => true,
                'تاريخ_النشر' => '2025-07-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
