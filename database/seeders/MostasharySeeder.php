<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{HealthConsultation, CareerConsultation, FamilyConsultation, BusinessConsultation, PsychologicalSupport};

class MostasharySeeder extends Seeder {
    public function run(): void {
        $this->command->info('👨‍⚕️ إنشاء بيانات قسم مستشاري...');
        
        HealthConsultation::create(['title' => 'استشارة صحة عامة', 'description' => 'استشارات في الصحة العامة والوقاية', 'consultant_name' => 'د. أحمد محمود', 'specialty' => 'طب عام', 'contact_email' => 'dr.ahmed@health.com', 'contact_phone' => '+201001111111', 'consultation_fee' => 300, 'is_active' => true]);
        HealthConsultation::create(['title' => 'استشارة تغذية', 'description' => 'نصائح تغذية وأنظمة غذائية صحية', 'consultant_name' => 'د. فاطمة علي', 'specialty' => 'تغذية علاجية', 'contact_email' => 'dr.fatma@nutrition.com', 'contact_phone' => '+201002222222', 'consultation_fee' => 250, 'is_active' => true]);
        
        CareerConsultation::create(['title' => 'تطوير المسار الوظيفي', 'description' => 'استشارات لتطوير وبناء مسارك المهني', 'consultant_name' => 'أ. سارة أحمد', 'expertise_area' => 'تطوير مهني', 'contact_email' => 'sara@career.com', 'contact_phone' => '+201003333333', 'consultation_fee' => 400, 'is_active' => true]);
        CareerConsultation::create(['title' => 'كتابة السيرة الذاتية', 'description' => 'مساعدة احترافية في إعداد CV مميز', 'consultant_name' => 'م. ليلى خالد', 'expertise_area' => 'كتابة احترافية', 'contact_email' => 'layla@cv.com', 'contact_phone' => '+201004444444', 'consultation_fee' => 200, 'is_active' => true]);
        
        FamilyConsultation::create(['title' => 'استشارات زوجية', 'description' => 'حل المشاكل الزوجية وتحسين العلاقة', 'consultant_name' => 'د. نورا محمد', 'specialty' => 'علاج عائلي', 'contact_email' => 'dr.nora@family.com', 'contact_phone' => '+201005555555', 'consultation_fee' => 500, 'is_active' => true]);
        
        BusinessConsultation::create(['title' => 'استشارات ريادة الأعمال', 'description' => 'إرشادات لبدء وإدارة مشروعك الخاص', 'consultant_name' => 'م. خالد أحمد', 'expertise_area' => 'ريادة أعمال', 'contact_email' => 'khaled@business.com', 'contact_phone' => '+201006666666', 'consultation_fee' => 600, 'is_active' => true]);
        BusinessConsultation::create(['title' => 'إدارة المشاريع الصغيرة', 'description' => 'نصائح لإدارة وتنمية مشروعك', 'consultant_name' => 'أ. ريم محمود', 'expertise_area' => 'إدارة مشاريع', 'contact_email' => 'reem@pm.com', 'contact_phone' => '+201007777777', 'consultation_fee' => 450, 'is_active' => true]);
        
        PsychologicalSupport::create(['title' => 'دعم نفسي وتنمية بشرية', 'description' => 'جلسات دعم نفسي وتطوير الذات', 'specialist_name' => 'د. مريم سعيد', 'specialty' => 'علم نفس إكلينيكي', 'contact_email' => 'dr.maryam@psych.com', 'contact_phone' => '+201008888888', 'session_fee' => 400, 'is_active' => true]);
        PsychologicalSupport::create(['title' => 'التعامل مع الضغوط', 'description' => 'تقنيات للتعامل مع التوتر والقلق', 'specialist_name' => 'أ. هدى عبدالله', 'specialty' => 'إدارة الضغوط', 'contact_email' => 'hoda@stress.com', 'contact_phone' => '+201009999999', 'session_fee' => 350, 'is_active' => true]);
        
        $this->command->info('✅ تم إنشاء بيانات قسم مستشاري بنجاح!');
    }
}
