<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForasyJob;
use App\Models\CareerAdvice;
use App\Models\ForasyBanner;
use App\Models\ForasyVideo;
use Carbon\Carbon;

class ForasySeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('💼 إنشاء بيانات قسم فورصى...');

        // إنشاء الوظائف
        $jobs = [
            [
                'title' => 'مطور ويب Full Stack',
                'description' => 'نبحث عن مطور ويب متمكن من تقنيات Front-end و Back-end للانضمام لفريقنا.',
                'company_name' => 'شركة التقنية المتقدمة',
                'location' => 'القاهرة، مصر',
                'job_type' => 'دوام كامل',
                'experience_level' => 'متوسط',
                'salary_range' => '8000 - 12000 جنيه',
                'requirements' => 'خبرة 2-3 سنوات في Laravel و Vue.js',
                'category' => 'تكنولوجيا المعلومات',
                'contact_email' => 'jobs@tech-company.com',
                'deadline' => Carbon::now()->addDays(30),
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'مصممة جرافيك',
                'description' => 'مطلوب مصممة جرافيك مبدعة للعمل على مشاريع تصميم متنوعة.',
                'company_name' => 'استوديو الإبداع',
                'location' => 'الجيزة، مصر',
                'job_type' => 'دوام جزئي',
                'experience_level' => 'مبتدئ',
                'salary_range' => '4000 - 6000 جنيه',
                'requirements' => 'إجادة Adobe Photoshop و Illustrator',
                'category' => 'تصميم',
                'contact_email' => 'hr@creative-studio.com',
                'deadline' => Carbon::now()->addDays(20),
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'مديرة تسويق رقمي',
                'description' => 'فرصة رائعة لمديرة تسويق رقمي للعمل مع فريق ديناميكي.',
                'company_name' => 'وكالة النجاح الرقمي',
                'location' => 'عن بعد',
                'job_type' => 'عن بعد',
                'experience_level' => 'خبير',
                'salary_range' => '10000 - 15000 جنيه',
                'requirements' => 'خبرة 5+ سنوات في التسويق الرقمي',
                'category' => 'تسويق',
                'contact_email' => 'careers@digitalagency.com',
                'deadline' => Carbon::now()->addDays(15),
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($jobs as $job) {
            ForasyJob::create($job);
        }

        // إنشاء النصائح المهنية
        $advices = [
            [
                'title' => 'كيف تكتبين سيرة ذاتية احترافية',
                'content' => 'السيرة الذاتية هي بوابتك للحصول على الوظيفة المناسبة. إليك أهم النصائح...',
                'category' => 'السيرة الذاتية',
                'author' => 'د. سارة أحمد',
                'is_featured' => true,
                'is_active' => true,
                'views' => 150,
            ],
            [
                'title' => 'نصائح للنجاح في المقابلة الشخصية',
                'content' => 'المقابلة الشخصية خطوة حاسمة في رحلة البحث عن عمل. تعرفي على أهم النصائح...',
                'category' => 'المقابلات',
                'author' => 'أ. ليلى محمد',
                'is_featured' => false,
                'is_active' => true,
                'views' => 200,
            ],
            [
                'title' => 'كيف تطورين مهاراتك المهنية',
                'content' => 'التطوير المستمر للمهارات ضروري للتقدم الوظيفي. إليك دليل شامل...',
                'category' => 'التطوير الوظيفي',
                'author' => 'م. نورا خالد',
                'is_featured' => true,
                'is_active' => true,
                'views' => 180,
            ],
        ];

        foreach ($advices as $advice) {
            CareerAdvice::create($advice);
        }

        // إنشاء البانرات
        $banners = [
            [
                'job_id' => 1,
                'title' => 'وظيفة مميزة - مطور ويب',
                'banner_image' => 'forasy-banners/web-dev.jpg',
                'link_url' => '/forasy/jobs/1',
                'description' => 'انضم لفريقنا الآن',
                'display_order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($banners as $banner) {
            ForasyBanner::create($banner);
        }

        // إنشاء الفيديوهات
        $videos = [
            [
                'job_id' => null,
                'title' => 'نصائح للباحثين عن عمل',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'description' => 'شاهد نصائحنا للباحثين عن عمل',
                'skip_after_seconds' => 5,
                'is_sponsored' => false,
                'is_active' => true,
                'display_order' => 1,
            ],
        ];

        foreach ($videos as $video) {
            ForasyVideo::create($video);
        }

        $this->command->info('✅ تم إنشاء بيانات قسم فورصى بنجاح!');
    }
}
