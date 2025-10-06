<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PromotionalVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🎬 إضافة الفيديوهات الترويجية لرحلاتي...');

        // إضافة بيانات للفيديوهات الترويجية (promo_videos)
        $this->createPromoVideos();
        
        // إضافة بيانات للفيديوهات الإعلانية (promotion_videos)
        $this->createPromotionVideos();

        $this->command->info('✅ تم إضافة الفيديوهات الترويجية بنجاح! 🎉');
    }

    private function createPromoVideos()
    {
        $this->command->info('📹 إضافة فيديوهات ترويجية...');

        $promoVideos = [
            [
                'title' => 'رحلات صيفية مذهلة إلى شرم الشيخ',
                'description' => 'استمتعي بأجمل الأوقات في شرم الشيخ مع عروض صيفية حصرية. شواطئ رائعة، أنشطة مائية، ووجهات سياحية لا تُنسى.',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلة إلى الأهرامات وأبو الهول',
                'description' => 'اكتشفي عجائب مصر القديمة مع رحلة تاريخية مميزة إلى الأهرامات وأبو الهول. تجربة لا تُنسى في أرض الفراعنة.',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلات بحرية في البحر الأحمر',
                'description' => 'انضمي إلى رحلة بحرية فاخرة في البحر الأحمر. مشاهدة الشعاب المرجانية والأسماك الملونة في رحلة لا تُنسى.',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلات السفاري في الصحراء البيضاء',
                'description' => 'مغامرة مثيرة في الصحراء البيضاء مع رحلات السفاري والاستمتاع بالطبيعة الخلابة تحت النجوم.',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلات إلى الإسكندرية - عروس البحر الأبيض',
                'description' => 'استمتعي بجمال الإسكندرية مع رحلات يومية تشمل المكتبة، قلعة قايتباي، والكورنيش الرائع.',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلات إلى الأقصر وأسوان',
                'description' => 'رحلة تاريخية مميزة إلى معابد الأقصر وأسوان مع رحلة نيلية رومانسية لا تُنسى.',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($promoVideos as $video) {
            DB::table('promo_videos')->updateOrInsert(
                ['title' => $video['title']],
                $video
            );
        }
    }

    private function createPromotionVideos()
    {
        $this->command->info('📺 إضافة فيديوهات إعلانية...');

        $promotionVideos = [
            [
                'title' => 'عرض خاص: رحلات إلى دبي',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'desc' => 'استمتعي بعروض حصرية على رحلات دبي مع فنادق فاخرة وتذاكر طيران مخفضة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلات إلى تركيا - اسطنبول وأنطاليا',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'desc' => 'اكتشفي جمال تركيا مع رحلات مميزة تشمل اسطنبول وأنطاليا مع عروض خاصة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلات إلى اليونان - أثينا وجزر اليونان',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'desc' => 'رحلة رومانسية إلى اليونان مع زيارة أثينا والاستمتاع بجمال جزر اليونان.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'عرض صيفي: رحلات إلى إيطاليا',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'desc' => 'استمتعي بجمال إيطاليا مع رحلات تشمل روما وفلورنسا والبندقية.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلات إلى المغرب - مراكش والدار البيضاء',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'desc' => 'اكتشفي سحر المغرب مع رحلات إلى مراكش والدار البيضاء مع تجربة ثقافية مميزة.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($promotionVideos as $video) {
            DB::table('promotion_videos')->updateOrInsert(
                ['title' => $video['title']],
                $video
            );
        }
    }
}