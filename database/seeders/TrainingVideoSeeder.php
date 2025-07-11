<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingVideo;

class TrainingVideoSeeder extends Seeder
{
    public function run(): void
    {
        TrainingVideo::insert([
            [
                'عنوان_الفيديو' => 'أساسيات تنسيق الإكسسوارات',
                'وصف_الفيديو' => 'دورة مجانية حول كيفية تنسيق الإكسسوارات مع الملابس.',
                'رابط_الفيديو' => 'https://www.youtube.com/watch?v=example1',
                'صورة_الغلاف' => 'training1.jpg',
                'التصنيف' => 'إكسسوارات',
                'النوع' => 'مجاني',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'عنوان_الفيديو' => 'تطوير الذات للمهتمين بالموضة',
                'وصف_الفيديو' => 'نصائح لتطوير الذات في عالم الموضة.',
                'رابط_الفيديو' => 'https://www.youtube.com/watch?v=example2',
                'صورة_الغلاف' => 'training2.jpg',
                'التصنيف' => 'تطوير ذات',
                'النوع' => 'مجاني',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
