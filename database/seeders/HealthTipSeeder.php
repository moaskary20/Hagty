<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthTip;
use App\Models\Doctor;

class HealthTipSeeder extends Seeder
{
    public function run(): void
    {
        // الحصول على بعض الأطباء للربط
        $doctors = Doctor::take(3)->get();
        
        $healthTips = [
            [
                'title' => 'أهمية شرب الماء',
                'description' => 'تعرف على فوائد شرب الماء وكمية الماء المناسبة يومياً',
                'type' => 'generic',
                'content_type' => 'text',
                'content' => '<p>شرب الماء ضروري لصحة الجسم، حيث يساعد في:</p><ul><li>تنظيم درجة حرارة الجسم</li><li>نقل المواد الغذائية للخلايا</li><li>إزالة السموم من الجسم</li><li>الحفاظ على ترطيب البشرة</li></ul><p>ينصح بشرب 8-10 أكواب من الماء يومياً.</p>',
                'is_active' => true,
                'views_count' => 150,
            ],
            [
                'title' => 'تمارين يومية بسيطة',
                'description' => 'مجموعة من التمارين السهلة التي يمكن ممارستها في المنزل',
                'type' => 'doctor_sponsored',
                'content_type' => 'youtube_link',
                'content' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'youtube_video_id' => 'dQw4w9WgXcQ',
                'doctor_id' => $doctors->first()?->id,
                'is_active' => true,
                'views_count' => 87,
            ],
            [
                'title' => 'النوم الصحي',
                'description' => 'نصائح للحصول على نوم هادئ ومريح',
                'type' => 'generic',
                'content_type' => 'text',
                'content' => '<p>النوم الجيد أساس الصحة العامة. إليك بعض النصائح:</p><ul><li>النوم 7-9 ساعات يومياً</li><li>تجنب الكافيين قبل النوم</li><li>الحفاظ على غرفة مظلمة وهادئة</li><li>وضع روتين ثابت للنوم</li></ul>',
                'is_active' => true,
                'views_count' => 203,
            ],
            [
                'title' => 'التغذية المتوازنة',
                'description' => 'دليل شامل للتغذية الصحية والمتوازنة',
                'type' => 'doctor_sponsored',
                'content_type' => 'video',
                'content' => 'https://example.com/nutrition-video.mp4',
                'doctor_id' => $doctors->skip(1)->first()?->id,
                'is_active' => true,
                'views_count' => 312,
            ],
            [
                'title' => 'إدارة الضغط النفسي',
                'description' => 'تقنيات فعالة للتعامل مع الضغط النفسي والتوتر',
                'type' => 'generic',
                'content_type' => 'text',
                'content' => '<p>الضغط النفسي جزء من الحياة، لكن يمكن إدارته بفعالية:</p><ul><li>ممارسة التأمل والاسترخاء</li><li>التنفس العميق</li><li>ممارسة الرياضة</li><li>التحدث مع الأصدقاء</li><li>تنظيم الوقت</li></ul>',
                'is_active' => true,
                'views_count' => 95,
            ],
            [
                'title' => 'العناية بالأسنان',
                'description' => 'نصائح مهمة للحفاظ على صحة الأسنان واللثة',
                'type' => 'doctor_sponsored',
                'content_type' => 'youtube_link',
                'content' => 'https://www.youtube.com/watch?v=sample123',
                'youtube_video_id' => 'sample123',
                'doctor_id' => $doctors->last()?->id,
                'is_active' => true,
                'views_count' => 178,
            ],
            [
                'title' => 'أضرار التدخين',
                'description' => 'التأثيرات الضارة للتدخين على الصحة وطرق الإقلاع',
                'type' => 'generic',
                'content_type' => 'text',
                'content' => '<p>التدخين يسبب أضراراً جسيمة للصحة:</p><ul><li>سرطان الرئة والفم</li><li>أمراض القلب والشرايين</li><li>ضعف جهاز المناعة</li><li>مشاكل في التنفس</li></ul><p>الإقلاع عن التدخين يحسن الصحة فوراً.</p>',
                'is_active' => true,
                'views_count' => 267,
            ],
            [
                'title' => 'الوقاية من الأمراض',
                'description' => 'خطوات بسيطة للوقاية من الأمراض الشائعة',
                'type' => 'generic',
                'content_type' => 'text',
                'content' => '<p>الوقاية خير من العلاج. اتبع هذه النصائح:</p><ul><li>غسل اليدين بانتظام</li><li>التطعيم في الوقت المحدد</li><li>تناول الطعام الصحي</li><li>ممارسة الرياضة</li><li>الفحوصات الدورية</li></ul>',
                'is_active' => true,
                'views_count' => 145,
            ],
        ];

        foreach ($healthTips as $tip) {
            HealthTip::create($tip);
        }
    }
}
