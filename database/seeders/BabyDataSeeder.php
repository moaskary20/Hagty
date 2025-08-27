<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BabyDayStep;
use App\Models\BabyHealthInfo;
use App\Models\BabyExpertAdvice;
use App\Models\BabyDoctorTip;
use App\Models\BabyMonthlyGrowth;
use App\Models\BabyShowerList;

class BabyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إضافة خطوات الطفل اليومية
        $daySteps = [
            [
                'title' => 'تغيير الحفاظة',
                'description' => 'تغيير حفاظة الطفل كل 2-3 ساعات أو عند الحاجة. تأكدي من تنظيف المنطقة جيداً واستخدام كريم الحماية.',
                'step_number' => 1,
                'age_group' => '0-12 شهر',
                'category' => 'العناية اليومية',
                'difficulty_level' => 'سهل',
                'is_active' => true
            ],
            [
                'title' => 'الرضاعة',
                'description' => 'إطعام الطفل كل 2-3 ساعات. للرضاعة الطبيعية، تأكدي من الوضعية الصحيحة. للرضاعة الصناعية، اتبعي التعليمات.',
                'step_number' => 2,
                'age_group' => '0-6 أشهر',
                'category' => 'التغذية',
                'difficulty_level' => 'متوسط',
                'is_active' => true
            ],
            [
                'title' => 'النوم الآمن',
                'description' => 'ضعي الطفل على ظهره للنوم، في سرير منفصل، بدون وسائد أو بطانيات فضفاضة.',
                'step_number' => 3,
                'age_group' => '0-12 شهر',
                'category' => 'النوم',
                'difficulty_level' => 'سهل',
                'is_active' => true
            ],
            [
                'title' => 'وقت البطن',
                'description' => 'ضعي الطفل على بطنه لفترات قصيرة عندما يكون مستيقظاً لتقوية عضلات الرقبة والظهر.',
                'step_number' => 4,
                'age_group' => '1-6 أشهر',
                'category' => 'التطوير الحركي',
                'difficulty_level' => 'متوسط',
                'is_active' => true
            ]
        ];

        foreach ($daySteps as $step) {
            BabyDayStep::create($step);
        }

        // إضافة المعلومات الصحية
        $healthInfos = [
            [
                'title' => 'أهمية الرضاعة الطبيعية',
                'content' => 'الرضاعة الطبيعية توفر جميع العناصر الغذائية التي يحتاجها طفلك في الأشهر الستة الأولى. كما تحمي من العدوى وتقوي جهاز المناعة.',
                'category' => 'التغذية',
                'age_range' => '0-6 أشهر',
                'source' => 'منظمة الصحة العالمية',
                'is_active' => true
            ],
            [
                'title' => 'علامات الجفاف عند الأطفال',
                'content' => 'راقبي علامات الجفاف مثل قلة البلل في الحفاظة، جفاف الفم، البكاء بدون دموع، والخمول. اتصلي بالطبيب فوراً إذا لاحظت هذه العلامات.',
                'category' => 'الصحة العامة',
                'age_range' => '0-12 شهر',
                'source' => 'الأكاديمية الأمريكية لطب الأطفال',
                'is_active' => true
            ],
            [
                'title' => 'التطعيمات المهمة',
                'content' => 'اتبعي جدول التطعيمات الموصى به من وزارة الصحة. التطعيمات تحمي طفلك من أمراض خطيرة ومعدية.',
                'category' => 'الوقاية',
                'age_range' => '0-24 شهر',
                'source' => 'وزارة الصحة السعودية',
                'is_active' => true
            ]
        ];

        foreach ($healthInfos as $info) {
            BabyHealthInfo::create($info);
        }

        // إضافة نصائح الخبراء
        $expertAdvices = [
            [
                'expert_name' => 'د. فاطمة أحمد',
                'expert_title' => 'أخصائية تربية الأطفال',
                'expert_specialization' => 'تربية الأطفال',
                'title' => 'بناء روتين يومي للطفل',
                'content' => 'إنشاء روتين ثابت يساعد الطفل على الشعور بالأمان ويسهل على الوالدين التنبؤ باحتياجاته. ابدئي بروتين بسيط للنوم والأكل.',
                'category' => 'تربية',
                'target_age' => '0-12 شهر',
                'is_active' => true
            ],
            [
                'expert_name' => 'د. محمد العلي',
                'expert_title' => 'استشاري تطوير الطفل',
                'expert_specialization' => 'تطوير الطفل',
                'title' => 'تطوير مهارات التواصل المبكر',
                'content' => 'تحدثي مع طفلك منذ الولادة، اقرئي له، وغني له. هذا يساعد في تطوير مهارات اللغة والتواصل منذ وقت مبكر.',
                'category' => 'تطوير',
                'target_age' => '0-18 شهر',
                'is_active' => true
            ]
        ];

        foreach ($expertAdvices as $advice) {
            BabyExpertAdvice::create($advice);
        }

        // إضافة نصائح الأطباء
        $doctorTips = [
            [
                'doctor_name' => 'د. سارة الزهراني',
                'doctor_specialization' => 'طبيبة أطفال',
                'doctor_title' => 'طبيبة أطفال',
                'title' => 'متى يجب الاتصال بالطبيب',
                'content' => 'اتصلي بالطبيب فوراً إذا كان طفلك يعاني من حمى، صعوبة في التنفس، قيء مستمر، أو إذا كان يبدو مريضاً جداً.',
                'medical_category' => 'صحة عامة',
                'urgency_level' => 'عالي',
                'age_group' => '0-12 شهر',
                'symptoms' => json_encode(['حمى', 'صعوبة تنفس', 'قيء', 'خمول']),
                'warnings' => json_encode(['اتصلي بالطبيب فوراً']),
                'requires_consultation' => 1,
                'is_emergency' => 1,
                'is_active' => true
            ],
            [
                'doctor_name' => 'د. أحمد المالكي',
                'doctor_specialization' => 'استشاري طب الأطفال',
                'doctor_title' => 'استشاري طب الأطفال',
                'title' => 'العناية بالحبل السري',
                'content' => 'حافظي على نظافة وجفاف منطقة الحبل السري. لا تستخدمي الكحول إلا إذا نصح الطبيب بذلك. سيسقط الحبل طبيعياً خلال 1-3 أسابيع.',
                'medical_category' => 'عناية حديثي الولادة',
                'urgency_level' => 'متوسط',
                'age_group' => '0-1 شهر',
                'symptoms' => json_encode(['احمرار', 'رائحة كريهة', 'إفرازات']),
                'warnings' => json_encode(['استشيري الطبيب إذا استمرت المشكلة']),
                'requires_consultation' => 0,
                'is_emergency' => 0,
                'is_active' => true
            ]
        ];

        foreach ($doctorTips as $tip) {
            BabyDoctorTip::create($tip);
        }

        // إضافة معلومات النمو الشهري
        $monthlyGrowths = [
            [
                'month_number' => 1,
                'title' => 'الشهر الأول - مرحبا بالعالم',
                'description' => 'في الشهر الأول، يتكيف طفلك مع العالم الخارجي. ينام معظم الوقت ويحتاج للرضاعة كل 2-3 ساعات.',
                'physical_development' => json_encode(['يزداد الوزن 150-200 جرام أسبوعياً', 'يفقد منعكس مورو تدريجياً']),
                'mental_development' => json_encode(['يبدأ في التركيز على الوجوه', 'يتفاعل مع الأصوات المألوفة']),
                'social_development' => json_encode(['يستجيب للمس', 'يبدأ في التعرف على الوالدين']),
                'milestones' => json_encode(['رفع الرأس لثوان قليلة', 'التحديق في الوجوه', 'الاستجابة للأصوات العالية']),
                'feeding_info' => json_encode(['رضاعة كل 2-3 ساعات', '6-8 رضعات يومياً']),
                'sleep_info' => json_encode(['16-17 ساعة يومياً', 'فترات قصيرة']),
                'safety_tips' => json_encode(['نوم آمن على الظهر', 'مراقبة مستمرة']),
                'weight_range' => '3-4.5 كجم',
                'height_range' => '50-55 سم',
                'image' => '/images/growth/month-1.jpg',
                'activities' => json_encode(['التحدث مع الطفل', 'الغناء', 'اللمس اللطيف']),
                'warning_signs' => json_encode(['عدم الرضاعة', 'عدم الاستجابة']),
                'is_active' => true
            ]
        ];

        foreach ($monthlyGrowths as $growth) {
            BabyMonthlyGrowth::create($growth);
        }

        // إضافة قائمة Baby Shower
        $showerItems = [
            [
                'item_name' => 'عربة أطفال',
                'description' => 'عربة أطفال آمنة ومريحة للتنقل مع الطفل',
                'category' => 'النقل',
                'priority' => 'عالي',
                'estimated_price' => 800.00,
                'size_info' => 'مناسبة لجميع الأعمار',
                'age_suitability' => '0-3 سنوات',
                'image' => '/images/baby-shower/stroller.jpg',
                'features' => json_encode(['قابلة للطي', 'خفيفة الوزن', 'آمنة']),
                'buying_tips' => json_encode(['اختاري المقاس المناسب', 'تأكدي من معايير السلامة']),
                'season' => 'جميع الفصول',
                'is_essential' => 1,
                'is_luxury' => 0,
                'is_active' => true
            ]
        ];

        foreach ($showerItems as $item) {
            BabyShowerList::create($item);
        }
    }
}
