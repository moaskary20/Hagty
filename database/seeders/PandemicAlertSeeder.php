<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PandemicAlert;

class PandemicAlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alerts = [
            [
                'title' => 'تنبيه مهم: انتشار فيروس الإنفلونزا الموسمية',
                'description' => 'تحذير من انتشار فيروس الإنفلونزا الموسمية في المحافظات. يجب اتخاذ الإجراءات الوقائية اللازمة.',
                'alert_level' => 'medium',
                'content_type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'safety_procedures' => 'ارتداء الكمامة في الأماكن المزدحمة، غسل اليدين بانتظام، تجنب لمس الوجه، الحصول على لقاح الإنفلونزا.',
                'status' => 'active',
                'health_authority' => 'وزارة الصحة والسكان',
                'alert_date' => now(),
                'expiry_date' => now()->addMonths(3),
                'target_areas' => 'جميع المحافظات',
            ],
            [
                'title' => 'تنبيه عاجل: حالة طوارئ صحية في القاهرة',
                'description' => 'تحذير من حالة طوارئ صحية في محافظة القاهرة. يجب على المواطنين اتخاذ الحذر الشديد.',
                'alert_level' => 'high',
                'content_type' => 'both',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'safety_procedures' => 'تجنب التجمعات الكبيرة، ارتداء الكمامة إجباري، التباعد الاجتماعي، التطهير المستمر.',
                'status' => 'active',
                'health_authority' => 'مديرية الصحة بالقاهرة',
                'alert_date' => now(),
                'expiry_date' => now()->addWeeks(2),
                'target_areas' => 'القاهرة الكبرى',
            ],
            [
                'title' => 'تحذير حرج: انتشار فيروس معدي',
                'description' => 'تحذير حرج من انتشار فيروس معدي خطير. يجب اتخاذ أقصى درجات الحذر والالتزام بالإجراءات الوقائية.',
                'alert_level' => 'critical',
                'content_type' => 'infographic',
                'safety_procedures' => 'الحجر الصحي المنزلي، تجنب مغادرة المنزل إلا للضرورة القصوى، ارتداء الكمامة N95، التطهير المستمر.',
                'status' => 'active',
                'health_authority' => 'منظمة الصحة العالمية',
                'alert_date' => now(),
                'expiry_date' => now()->addMonth(),
                'target_areas' => 'جميع المحافظات',
            ],
            [
                'title' => 'إشعار بسيط: حملة التطعيم الوقائي',
                'description' => 'تذكير بسيط بأهمية الحصول على التطعيمات الوقائية المتاحة في المراكز الصحية.',
                'alert_level' => 'low',
                'content_type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'safety_procedures' => 'الحصول على التطعيمات في المواعيد المحددة، اتباع تعليمات الطبيب، مراجعة المركز الصحي.',
                'status' => 'active',
                'health_authority' => 'وزارة الصحة والسكان',
                'alert_date' => now(),
                'expiry_date' => now()->addMonths(6),
                'target_areas' => 'جميع المحافظات',
            ],
            [
                'title' => 'تحذير من موجة حر شديدة',
                'description' => 'تحذير من موجة حر شديدة قد تؤثر على الصحة العامة. يجب اتخاذ الإجراءات الوقائية ضد الحر.',
                'alert_level' => 'medium',
                'content_type' => 'both',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'safety_procedures' => 'تجنب التعرض لأشعة الشمس المباشرة، شرب كميات كافية من الماء، ارتداء ملابس فاتحة اللون.',
                'status' => 'active',
                'health_authority' => 'الهيئة العامة للأرصاد الجوية',
                'alert_date' => now(),
                'expiry_date' => now()->addWeeks(1),
                'target_areas' => 'صعيد مصر',
            ],
            [
                'title' => 'تحذير من تلوث الهواء',
                'description' => 'تحذير من ارتفاع مستوى تلوث الهواء في بعض المناطق. يجب على المواطنين اتخاذ الحذر.',
                'alert_level' => 'medium',
                'content_type' => 'infographic',
                'safety_procedures' => 'تجنب الأنشطة الخارجية، إغلاق النوافذ، استخدام أجهزة تنقية الهواء، ارتداء الكمامة.',
                'status' => 'active',
                'health_authority' => 'جهاز شؤون البيئة',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(5),
                'target_areas' => 'القاهرة والجيزة',
            ],
            [
                'title' => 'تحذير منتهي الصلاحية: إنفلونزا الطيور',
                'description' => 'تحذير سابق من إنفلونزا الطيور. هذا التحذير منتهي الصلاحية.',
                'alert_level' => 'high',
                'content_type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'safety_procedures' => 'تجنب التعامل مع الطيور، طبخ اللحوم جيداً، غسل اليدين بعد التعامل مع الطيور.',
                'status' => 'inactive',
                'health_authority' => 'وزارة الصحة والسكان',
                'alert_date' => now()->subMonths(2),
                'expiry_date' => now()->subWeeks(1),
                'target_areas' => 'المحافظات الريفية',
            ],
            [
                'title' => 'تحذير حرج: تفشي مرض معدي',
                'description' => 'تحذير حرج من تفشي مرض معدي خطير. يجب اتخاذ أقصى درجات الحذر.',
                'alert_level' => 'critical',
                'content_type' => 'both',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'safety_procedures' => 'الحجر الصحي الإجباري، تجنب التجمعات، التطهير المستمر، طلب المساعدة الطبية فوراً عند ظهور أعراض.',
                'status' => 'active',
                'health_authority' => 'منظمة الصحة العالمية',
                'alert_date' => now(),
                'expiry_date' => now()->addMonths(2),
                'target_areas' => 'جميع المحافظات',
            ],
        ];

        foreach ($alerts as $alert) {
            PandemicAlert::create($alert);
        }
    }
}
