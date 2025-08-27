<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForasyCourse;

class ForasyCourseSeeder extends Seeder
{
    public function run(): void
    {
        ForasyCourse::insert([
            [
                'name' => 'دورة تطوير الذات',
                'short_description' => 'أساسيات تطوير الذات والنجاح الشخصي.',
                'description' => 'دورة شاملة حول مهارات تطوير الذات، تحديد الأهداف، وإدارة الوقت.',
                'video_url' => 'https://www.youtube.com/watch?v=example1',
                'cover_image' => 'courses/self_development.jpg',
                'category' => 'تطوير ذات',
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مهارات الحياة اليومية',
                'short_description' => 'تعلم مهارات الحياة الأساسية.',
                'description' => 'دورة تفاعلية حول مهارات التواصل، حل المشكلات، وإدارة الضغوط.',
                'video_url' => 'https://www.youtube.com/watch?v=example2',
                'cover_image' => 'courses/life_skills.jpg',
                'category' => 'مهارات حياتية',
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
