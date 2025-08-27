<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExpertAdvice;
use App\Models\GrandmaAdvice;
use App\Models\PodcastEpisode;

class HowToBeMomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // نصائح الخبراء
        ExpertAdvice::create([
            'title' => 'التغذية السليمة أثناء فترة الحمل',
            'description' => 'دليل شامل لتغذية صحية ومتوازنة للأم الحامل',
            'expert_name' => 'د. سارة أحمد',
            'expert_specialization' => 'طب النساء والولادة',
            'content_type' => 'text',
            'content' => 'من المهم جداً للأم الحامل أن تهتم بتغذيتها لضمان صحة الجنين. يجب تناول الأطعمة الغنية بالفولات مثل الخضروات الورقية، والحديد من اللحوم والبقوليات، والكالسيوم من منتجات الألبان. كما يُنصح بتجنب الأطعمة النيئة والمأكولات البحرية عالية الزئبق.',
            'category' => 'pregnancy',
            'is_featured' => true,
            'views_count' => 245,
            'likes_count' => 78,
            'is_active' => true
        ]);

        ExpertAdvice::create([
            'title' => 'نصائح للاستعداد للولادة الطبيعية',
            'description' => 'كيفية الاستعداد جسدياً ونفسياً للولادة',
            'expert_name' => 'د. منى خالد',
            'expert_specialization' => 'أخصائية الولادة الطبيعية',
            'content_type' => 'video',
            'content' => 'https://youtube.com/watch?v=sample-video-id',
            'category' => 'delivery',
            'is_featured' => false,
            'views_count' => 189,
            'likes_count' => 65,
            'is_active' => true
        ]);

        ExpertAdvice::create([
            'title' => 'أساسيات الرضاعة الطبيعية للأمهات الجدد',
            'description' => 'دليل شامل للرضاعة الطبيعية وحل المشاكل الشائعة',
            'expert_name' => 'د. ليلى حسن',
            'expert_specialization' => 'استشارية الرضاعة الطبيعية',
            'content_type' => 'text',
            'content' => 'الرضاعة الطبيعية هي أفضل غذاء للطفل. يجب البدء بالرضاعة خلال الساعة الأولى من الولادة. من المهم التأكد من وضعية الطفل الصحيحة أثناء الرضاعة لتجنب التهاب الحلمات.',
            'category' => 'breastfeeding',
            'is_featured' => true,
            'views_count' => 312,
            'likes_count' => 98,
            'is_active' => true
        ]);

        // نصائح الجدات
        GrandmaAdvice::create([
            'title' => 'علاج طبيعي لغثيان الحمل',
            'description' => 'وصفة جدتي الطبيعية للتخلص من غثيان الصباح',
            'grandma_name' => 'الحاجة فاطمة السيد',
            'grandma_age' => 75,
            'advice_text' => 'في زمني، كنا نشرب الزنجبيل مع الماء الدافئ والعسل على الريق. هذا كان يهدئ المعدة ويقلل الغثيان. كما كنا نتناول قطع صغيرة من البسكويت المالح قبل النهوض من الفراش.',
            'advice_type' => 'text',
            'category' => 'pregnancy',
            'is_featured' => true,
            'views_count' => 189,
            'likes_count' => 95,
            'is_active' => true
        ]);

        GrandmaAdvice::create([
            'title' => 'تحضير جسم الأم للولادة',
            'description' => 'نصائح من الجدات لتسهيل عملية الولادة',
            'grandma_name' => 'ست زينب محمود',
            'grandma_age' => 82,
            'advice_text' => 'كنا نمشي كثيراً في الشهر الأخير، ونشرب الحلبة بالعسل. والأهم من ذلك، كنا نقرأ القرآن ونذكر الله لتهدئة النفس والاستعانة بالله في هذه الرحلة المباركة.',
            'advice_type' => 'text',
            'category' => 'delivery',
            'is_featured' => false,
            'views_count' => 156,
            'likes_count' => 72,
            'is_active' => true
        ]);

        GrandmaAdvice::create([
            'title' => 'العناية بالطفل حديث الولادة',
            'description' => 'حكمة الجدات في رعاية الأطفال الرضع',
            'grandma_name' => 'أم محمد عثمان',
            'grandma_age' => 68,
            'advice_text' => 'الطفل حديث الولادة يحتاج للحنان والدفء. كنا نلف الطفل بقماش ناعم ونحافظ على دفء البيت. والرضاعة الطبيعية هي أفضل شيء له، لا تتركي أحداً يقنعك بغير ذلك.',
            'advice_type' => 'audio',
            'media_url' => 'https://example.com/audio/grandma-advice-1.mp3',
            'duration' => 5,
            'category' => 'baby_care',
            'is_featured' => true,
            'views_count' => 278,
            'likes_count' => 134,
            'is_active' => true
        ]);

        // حلقات البودكاست
        PodcastEpisode::create([
            'title' => 'رحلة الحمل: من البداية إلى النهاية',
            'description' => 'نناقش مراحل الحمل المختلفة وكيفية التعامل مع كل مرحلة',
            'episode_number' => 1,
            'season_number' => 1,
            'host_name' => 'د. منى سالم',
            'guest_name' => 'د. أحمد فتحي',
            'guest_bio' => 'استشاري طب النساء والولادة بمستشفى القاهرة',
            'audio_url' => 'https://example.com/podcast/episode-1.mp3',
            'thumbnail_image' => 'https://example.com/images/episode-1-thumb.jpg',
            'duration' => 45,
            'category' => 'pregnancy_tips',
            'tags' => ['حمل', 'نصائح', 'صحة'],
            'published_at' => now()->subDays(7),
            'is_featured' => true,
            'views_count' => 312,
            'downloads_count' => 156,
            'is_active' => true
        ]);

        PodcastEpisode::create([
            'title' => 'الرضاعة الطبيعية: فوائد وتحديات',
            'description' => 'كل ما تحتاجين معرفته عن الرضاعة الطبيعية',
            'episode_number' => 2,
            'season_number' => 1,
            'host_name' => 'د. منى سالم',
            'guest_name' => 'د. نورا عبدالرحمن',
            'guest_bio' => 'استشارية الرضاعة الطبيعية',
            'audio_url' => 'https://example.com/podcast/episode-2.mp3',
            'video_url' => 'https://youtube.com/watch?v=episode-2',
            'thumbnail_image' => 'https://example.com/images/episode-2-thumb.jpg',
            'duration' => 38,
            'category' => 'baby_care',
            'tags' => ['رضاعة', 'طفل', 'صحة'],
            'published_at' => now()->subDays(3),
            'is_featured' => false,
            'views_count' => 245,
            'downloads_count' => 123,
            'is_active' => true
        ]);

        PodcastEpisode::create([
            'title' => 'التغذية أثناء الحمل والرضاعة',
            'description' => 'دليل شامل للتغذية الصحية للأم والطفل',
            'episode_number' => 3,
            'season_number' => 1,
            'host_name' => 'د. منى سالم',
            'guest_name' => 'د. هدى خليل',
            'guest_bio' => 'أخصائية التغذية العلاجية',
            'audio_url' => 'https://example.com/podcast/episode-3.mp3',
            'thumbnail_image' => 'https://example.com/images/episode-3-thumb.jpg',
            'duration' => 52,
            'category' => 'nutrition',
            'tags' => ['تغذية', 'حمل', 'رضاعة'],
            'published_at' => now()->subDays(1),
            'is_featured' => true,
            'views_count' => 198,
            'downloads_count' => 89,
            'is_active' => true
        ]);
    }
}
