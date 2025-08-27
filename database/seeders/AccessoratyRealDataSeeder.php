<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessoratyRealDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🎨 إضافة بيانات حقيقية للأكسسوراتي مع صور...');

        // إضافة إعلانات البانر مع صور حقيقية
        $bannerAds = [
            [
                'title' => 'عروض الإكسسوارات الذهبية',
                'description' => 'اكتشفي أجمل الإكسسوارات الذهبية بأسعار مميزة. عروض حصرية على المجوهرات والسلاسل والأساور.',
                'image' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800&h=400&fit=crop',
                'link' => 'https://example.com/golden-accessories',
                'location' => 'متجر الإكسسوارات الملكي',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'مجموعة الفضة الإيطالية',
                'description' => 'مجموعة فريدة من الإكسسوارات الفضية الإيطالية. تصميمات عصرية وأنيقة تناسب كل مناسبة.',
                'image' => 'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=800&h=400&fit=crop',
                'link' => 'https://example.com/silver-collection',
                'location' => 'صالون الأناقة',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'أطقم الماس الفاخرة',
                'description' => 'أطقم الماس الفاخرة من أفضل العلامات التجارية. إطلالة ملكية لكل مناسبة خاصة.',
                'image' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=800&h=400&fit=crop',
                'link' => 'https://example.com/diamond-sets',
                'location' => 'دار المجوهرات الفاخرة',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'عروض الربيع الجديدة',
                'description' => 'عروض الربيع الجديدة على الإكسسوارات الملونة. ألوان نابضة بالحياة تناسب موسم الربيع.',
                'image' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=800&h=400&fit=crop',
                'link' => 'https://example.com/spring-collection',
                'location' => 'متجر الربيع',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'إكسسوارات العروس',
                'description' => 'مجموعة خاصة من الإكسسوارات للعروس. تصميمات فريدة تناسب يوم العرس المميز.',
                'image' => 'https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=800&h=400&fit=crop',
                'link' => 'https://example.com/bride-accessories',
                'location' => 'صالون العروس',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($bannerAds as $banner) {
            DB::table('accessoraty_banner_ads')->updateOrInsert(
                ['title' => $banner['title']],
                $banner
            );
        }

        // إضافة إعلانات الفيديو مع صور مصغرة
        $sponsorVideos = [
            [
                'title' => 'كيفية اختيار الإكسسوارات المناسبة',
                'description' => 'فيديو تعليمي يوضح كيفية اختيار الإكسسوارات المناسبة لكل مناسبة وطريقة ارتدائها.',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=400&h=300&fit=crop',
                'duration' => '5:30',
                'skip_after_seconds' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'أحدث صيحات الإكسسوارات 2024',
                'description' => 'تعرفي على أحدث صيحات الإكسسوارات لعام 2024 وكيفية دمجها مع إطلالتك.',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=400&h=300&fit=crop',
                'duration' => '8:15',
                'skip_after_seconds' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رعاية وتنظيف الإكسسوارات',
                'description' => 'نصائح مهمة لرعاية وتنظيف الإكسسوارات للحفاظ على بريقها وجمالها.',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=300&fit=crop',
                'duration' => '6:45',
                'skip_after_seconds' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'إكسسوارات للعمل والاجتماعات',
                'description' => 'إكسسوارات أنيقة ومناسبة للعمل والاجتماعات الرسمية. إطلالة احترافية ومميزة.',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=400&h=300&fit=crop',
                'duration' => '7:20',
                'skip_after_seconds' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'إكسسوارات السهرات والحفلات',
                'description' => 'إكسسوارات مبهرة للسهرات والحفلات. إطلالة مميزة تجعلكِ نجمة الحفل.',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=400&h=300&fit=crop',
                'duration' => '9:10',
                'skip_after_seconds' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($sponsorVideos as $video) {
            DB::table('accessoraty_sponsor_videos')->updateOrInsert(
                ['title' => $video['title']],
                $video
            );
        }

        $this->command->info('✅ تم إضافة بيانات أكسسوراتى بنجاح!');
    }
}
