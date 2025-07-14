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
                'expert_specialization' => 'أخصائية تربية الأطفال',
                'title' => 'بناء روتين يومي للطفل',
                'content' => 'إنشاء روتين ثابت يساعد الطفل على الشعور بالأمان ويسهل على الوالدين التنبؤ باحتياجاته. ابدئي بروتين بسيط للنوم والأكل.',
                'target_age' => '0-12 شهر',
                'tips' => 'كوني مرنة في البداية، الثبات مع الوقت، راقبي إشارات طفلك',
                'is_active' => true
            ],
            [
                'expert_name' => 'د. محمد العلي',
                'expert_specialization' => 'استشاري تطوير الطفل',
                'title' => 'تطوير مهارات التواصل المبكر',
                'content' => 'تحدثي مع طفلك منذ الولادة، اقرئي له، وغني له. هذا يساعد في تطوير مهارات اللغة والتواصل منذ وقت مبكر.',
                'target_age' => '0-18 شهر',
                'tips' => 'استخدمي تعبيرات الوجه، كرري الأصوات، اقرئي يومياً',
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
                'title' => 'متى يجب الاتصال بالطبيب',
                'content' => 'اتصلي بالطبيب فوراً إذا كان طفلك يعاني من حمى، صعوبة في التنفس، قيء مستمر، أو إذا كان يبدو مريضاً جداً.',
                'urgency_level' => 'عالي',
                'symptoms' => 'حمى، صعوبة تنفس، قيء، خمول',
                'age_group' => '0-12 شهر',
                'is_active' => true
            ],
            [
                'doctor_name' => 'د. أحمد المالكي',
                'doctor_specialization' => 'استشاري طب الأطفال',
                'title' => 'العناية بالحبل السري',
                'content' => 'حافظي على نظافة وجفاف منطقة الحبل السري. لا تستخدمي الكحول إلا إذا نصح الطبيب بذلك. سيسقط الحبل طبيعياً خلال 1-3 أسابيع.',
                'urgency_level' => 'متوسط',
                'symptoms' => 'احمرار، رائحة كريهة، إفرازات',
                'age_group' => '0-1 شهر',
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
                'physical_development' => 'يزداد الوزن 150-200 جرام أسبوعياً، يفقد منعكس مورو تدريجياً',
                'cognitive_development' => 'يبدأ في التركيز على الوجوه، يتفاعل مع الأصوات المألوفة',
                'milestones' => 'رفع الرأس لثوان قليلة، التحديق في الوجوه، الاستجابة للأصوات العالية',
                'care_tips' => 'رضاعة منتظمة، نوم آمن، تفاعل لطيف',
                'is_active' => true
            ],
            [
                'month_number' => 2,
                'title' => 'الشهر الثاني - الابتسامات الأولى',
                'description' => 'يبدأ طفلك في إظهار ابتساماته الاجتماعية الأولى ويصبح أكثر تنبهاً لمحيطه.',
                'physical_development' => 'تحسن في التحكم برفع الرأس، حركات أكثر سلاسة',
                'cognitive_development' => 'ابتسامات اجتماعية، تتبع الأشياء بالعيون',
                'milestones' => 'الابتسام للآخرين، إصدار أصوات ناعمة، رفع الرأس 45 درجة',
                'care_tips' => 'مزيد من وقت البطن، التحدث والغناء، اللعب البصري',
                'is_active' => true
            ],
            [
                'month_number' => 3,
                'title' => 'الشهر الثالث - الاكتشاف',
                'description' => 'يصبح طفلك أكثر تفاعلاً ويبدأ في اكتشاف يديه وصوته.',
                'physical_development' => 'تحكم أفضل في الرأس والرقبة، بداية تحريك الذراعين بقصد',
                'cognitive_development' => 'ضحك، تقليد بعض الحركات والأصوات',
                'milestones' => 'رفع الرأس والصدر في وقت البطن، إمساك الأشياء لفترة قصيرة',
                'care_tips' => 'ألعاب تحفز الحواس، قراءة القصص، تنويع الأنشطة',
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
                'estimated_price' => '800.00',
                'notes' => 'يفضل أن تكون قابلة للطي وخفيفة الوزن',
                'is_purchased' => false,
                'is_active' => true
            ],
            [
                'item_name' => 'سرير أطفال',
                'description' => 'سرير آمن مع مرتبة مناسبة لحديثي الولادة',
                'category' => 'النوم',
                'priority' => 'عالي',
                'estimated_price' => '1200.00',
                'notes' => 'يجب أن يكون مطابقاً لمعايير السلامة',
                'is_purchased' => false,
                'is_active' => true
            ],
            [
                'item_name' => 'ملابس حديثي الولادة',
                'description' => 'مجموعة ملابس قطنية ناعمة مناسبة للأطفال الرضع',
                'category' => 'الملابس',
                'priority' => 'عالي',
                'estimated_price' => '300.00',
                'notes' => 'يفضل القطن الطبيعي، مقاسات مختلفة',
                'is_purchased' => false,
                'is_active' => true
            ],
            [
                'item_name' => 'مقعد سيارة للأطفال',
                'description' => 'مقعد سيارة آمن مخصص لحديثي الولادة',
                'category' => 'النقل',
                'priority' => 'عالي',
                'estimated_price' => '600.00',
                'notes' => 'ضروري قبل مغادرة المستشفى',
                'is_purchased' => false,
                'is_active' => true
            ],
            [
                'item_name' => 'زجاجات رضاعة',
                'description' => 'مجموعة زجاجات رضاعة مع حلمات مناسبة للأطفال',
                'category' => 'التغذية',
                'priority' => 'متوسط',
                'estimated_price' => '150.00',
                'notes' => 'خالية من BPA، سهلة التنظيف',
                'is_purchased' => false,
                'is_active' => true
            ],
            [
                'item_name' => 'حفاظات',
                'description' => 'مخزون من الحفاظات بمقاسات مختلفة',
                'category' => 'العناية',
                'priority' => 'عالي',
                'estimated_price' => '400.00',
                'notes' => 'احتياطي لعدة أشهر، مقاسات متنوعة',
                'is_purchased' => false,
                'is_active' => true
            ]
        ];

        foreach ($showerItems as $item) {
            BabyShowerList::create($item);
        }
    }
}
