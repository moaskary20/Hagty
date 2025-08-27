<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UmomiSubsectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🤱 بدء إضافة البيانات للأقسام الفرعية في أومومتي...');

        // 1. متابعة الطبيب - أطباء الأمومة فقط
        $this->createMaternityDoctors();
        
        // 2. العناية أسبوعياً - بيانات أساسية فقط
        $this->createWeeklyBabyCare();
        
        // 3. استعدي لاستقبال... - بيانات أساسية فقط
        $this->createDeliveryPreparations();

        $this->command->info('✅ تم إضافة جميع البيانات للأقسام الفرعية بنجاح! 🎉');
    }

    private function createMaternityDoctors()
    {
        $this->command->info('👨‍⚕️ إنشاء بيانات أطباء الأمومة...');

        // إنشاء أطباء الأمومة
        $doctors = [
            [
                'name' => 'د. فاطمة أحمد محمد',
                'title' => 'أخصائية نساء وولادة',
                'specialty' => 'نساء وولادة',
                'clinic_name' => 'عيادة الأمومة المتقدمة',
                'clinic_address' => 'شارع الملك فهد، حي النزهة، الرياض',
                'phone_numbers' => json_encode(['+966501234567', '+966112345678']),
                'google_maps_url' => 'https://maps.google.com/?q=24.7136,46.6753',
                'years_of_experience' => 15,
                'consultation_fees' => '300 ريال',
                'working_hours' => json_encode(['09:00-17:00', '19:00-21:00']),
                'available_days' => json_encode(['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس']),
                'rating' => 4.9,
                'description' => 'دكتورة متخصصة في طب النساء والولادة مع خبرة 15 عام في رعاية الحوامل والولادة الآمنة',
                'qualifications' => json_encode(['دكتوراه في طب النساء والولادة', 'زمالة الكلية الملكية البريطانية', 'شهادة في طب الأجنة']),
                'languages_spoken' => json_encode(['العربية', 'الإنجليزية']),
                'is_verified' => true,
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. نورا خالد السعد',
                'title' => 'أخصائية نساء وولادة',
                'specialty' => 'طب الأجنة',
                'clinic_name' => 'مركز رعاية الأم والجنين',
                'clinic_address' => 'شارع التحلية، حي الشاطئ، جدة',
                'phone_numbers' => json_encode(['+966507654321', '+966126789012']),
                'google_maps_url' => 'https://maps.google.com/?q=21.4858,39.1925',
                'years_of_experience' => 12,
                'consultation_fees' => '350 ريال',
                'working_hours' => json_encode(['08:00-16:00', '18:00-20:00']),
                'available_days' => json_encode(['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس']),
                'rating' => 4.8,
                'description' => 'دكتورة متخصصة في طب الأجنة ورعاية الحوامل عالي الخطورة',
                'qualifications' => json_encode(['دكتوراه في طب النساء والولادة', 'تخصص في طب الأجنة', 'شهادة في الموجات فوق الصوتية']),
                'languages_spoken' => json_encode(['العربية', 'الإنجليزية', 'الفرنسية']),
                'is_verified' => true,
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. سارة محمد العلي',
                'title' => 'أخصائية رضاعة طبيعية',
                'specialty' => 'الرضاعة الطبيعية',
                'clinic_name' => 'عيادة الرضاعة الطبيعية',
                'clinic_address' => 'شارع الأمير محمد بن فهد، حي الشاطئ، الدمام',
                'phone_numbers' => json_encode(['+966503456789', '+966133456789']),
                'google_maps_url' => 'https://maps.google.com/?q=26.4207,50.0888',
                'years_of_experience' => 8,
                'consultation_fees' => '250 ريال',
                'working_hours' => json_encode(['10:00-18:00']),
                'available_days' => json_encode(['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس']),
                'rating' => 4.7,
                'description' => 'دكتورة متخصصة في الرضاعة الطبيعية ورعاية الأمهات الجدد',
                'qualifications' => json_encode(['دكتوراه في طب الأطفال', 'تخصص في الرضاعة الطبيعية', 'شهادة استشارية دولية']),
                'languages_spoken' => json_encode(['العربية', 'الإنجليزية']),
                'is_verified' => true,
                'is_featured' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($doctors as $doctor) {
            DB::table('maternity_doctors')->updateOrInsert(
                ['name' => $doctor['name']],
                $doctor
            );
        }

        $this->command->info('✅ تم إنشاء بيانات أطباء الأمومة بنجاح');
    }

    private function createWeeklyBabyCare()
    {
        $this->command->info('📅 إنشاء بيانات العناية الأسبوعية...');

        // إنشاء بيانات العناية الأسبوعية
        $weeklyCare = [
            [
                'week_number' => 1,
                'title' => 'الأسبوع الأول - بداية الحمل',
                'baby_development_description' => 'في هذا الأسبوع، يحدث الإخصاب وانغراس البويضة في جدار الرحم',
                'baby_size_comparison' => 'حجم رأس الدبوس',
                'baby_weight_range' => '0.001 جرام',
                'baby_length_range' => '0.1 ملم',
                'development_milestones' => json_encode(['الإخصاب', 'انغراس البويضة', 'بداية تكوين المشيمة']),
                'ultrasound_details' => 'لا يمكن رؤية الجنين بالسونار بعد',
                'mother_symptoms' => json_encode(['تأخر الدورة الشهرية', 'غثيان خفيف', 'تعب عام']),
                'recommended_foods' => json_encode(['حمض الفوليك', 'الحديد', 'الكالسيوم', 'البروتين']),
                'forbidden_foods' => json_encode(['اللحوم النيئة', 'الأسماك عالية الزئبق', 'الأجبان الطرية']),
                'exercise_recommendations' => json_encode(['مشي خفيف', 'يوجا للحوامل', 'تمارين التنفس']),
                'medical_checkups' => json_encode(['فحص الدم', 'فحص البول', 'قياس الضغط']),
                'tips_and_advice' => json_encode(['ابدئي بتناول حمض الفوليك', 'تجنبي التدخين والكحول', 'احرصي على الراحة الكافية']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'week_number' => 4,
                'title' => 'الأسبوع الرابع - تأكيد الحمل',
                'baby_development_description' => 'يبدأ القلب البدائي في النبض وتتكون الأعضاء الأساسية',
                'baby_size_comparison' => 'حجم حبة الأرز',
                'baby_weight_range' => '0.004 جرام',
                'baby_length_range' => '0.4 ملم',
                'development_milestones' => json_encode(['تكوين القلب البدائي', 'بداية تكوين الدماغ', 'تكوين الحبل السري']),
                'ultrasound_details' => 'يمكن رؤية كيس الحمل في الرحم',
                'mother_symptoms' => json_encode(['غثيان الصباح', 'تعب شديد', 'تقلبات مزاجية', 'ألم في الثديين']),
                'recommended_foods' => json_encode(['الخضروات الورقية', 'الحمضيات', 'المكسرات', 'الأسماك منخفضة الزئبق']),
                'forbidden_foods' => json_encode(['القهوة بكميات كبيرة', 'المشروبات الغازية', 'الأطعمة المعلبة']),
                'exercise_recommendations' => json_encode(['مشي يومي', 'تمارين كيجل', 'تمارين التمدد']),
                'medical_checkups' => json_encode(['فحص هرمون الحمل', 'فحص الدم الشامل', 'فحص السكر']),
                'tips_and_advice' => json_encode(['احرصي على النوم 8 ساعات', 'اشربي 8 أكواب ماء يومياً', 'تجنبي التوتر']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'week_number' => 8,
                'title' => 'الأسبوع الثامن - تكوين الأعضاء',
                'baby_development_description' => 'تتكون جميع الأعضاء الرئيسية ويبدأ الجنين في الحركة',
                'baby_size_comparison' => 'حجم حبة العنب',
                'baby_weight_range' => '1 جرام',
                'baby_length_range' => '1.6 سم',
                'development_milestones' => json_encode(['تكوين جميع الأعضاء', 'بداية الحركة', 'تكوين الأصابع']),
                'ultrasound_details' => 'يمكن رؤية نبض القلب بوضوح وحركة الجنين',
                'mother_symptoms' => json_encode(['غثيان مستمر', 'تعب شديد', 'ألم في الظهر', 'تغيرات في البشرة']),
                'recommended_foods' => json_encode(['البروتين عالي الجودة', 'الأوميغا 3', 'الفيتامينات', 'المعادن']),
                'forbidden_foods' => json_encode(['اللحوم المصنعة', 'الأطعمة المقلية', 'السكريات المكررة']),
                'exercise_recommendations' => json_encode(['سباحة خفيفة', 'مشي في الطبيعة', 'تمارين القوة الخفيفة']),
                'medical_checkups' => json_encode(['فحص السونار التفصيلي', 'فحص الدم', 'فحص البول']),
                'tips_and_advice' => json_encode(['استخدمي وسادة الحمل', 'ارتدي ملابس مريحة', 'احرصي على الاسترخاء']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($weeklyCare as $care) {
            DB::table('weekly_baby_cares')->updateOrInsert(
                ['week_number' => $care['week_number']],
                $care
            );
        }

        $this->command->info('✅ تم إنشاء بيانات العناية الأسبوعية بنجاح');
    }

    private function createDeliveryPreparations()
    {
        $this->command->info('🎁 إنشاء بيانات الاستعداد للولادة...');

        // إنشاء مستلزمات الولادة
        $deliveryPreparations = [
            [
                'title' => 'مستلزمات الولادة الأساسية',
                'description' => 'قائمة شاملة بجميع المستلزمات المطلوبة للولادة',
                'category' => 'مستلزمات أساسية',
                'importance_level' => 'عالية',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'مستلزمات الطفل الأساسية',
                'description' => 'جميع المستلزمات المطلوبة للطفل في الأيام الأولى',
                'category' => 'مستلزمات الطفل',
                'importance_level' => 'عالية',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($deliveryPreparations as $preparation) {
            DB::table('delivery_preparations')->updateOrInsert(
                ['title' => $preparation['title']],
                $preparation
            );
        }

        $this->command->info('✅ تم إنشاء بيانات الاستعداد للولادة بنجاح');
    }
}
