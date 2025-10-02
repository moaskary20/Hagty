<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{EducationalProgram, WomenSuccessStory, LeadershipSkill, WomenInitiative, EmpowermentResource};

class NesaaAlghadSeeder extends Seeder {
    public function run(): void {
        $this->command->info('👩‍🎓 إنشاء بيانات قسم نساء الغد...');
        
        EducationalProgram::create(['program_name' => 'دورة القيادة النسائية', 'description' => 'برنامج متكامل لتطوير مهارات القيادة', 'category' => 'قيادة', 'duration_hours' => 40, 'price' => 2000, 'instructor' => 'د. سارة محمد', 'level' => 'متوسط', 'is_featured' => true, 'is_active' => true]);
        EducationalProgram::create(['program_name' => 'ريادة الأعمال للنساء', 'description' => 'تعلمي كيف تبدأين مشروعك الخاص', 'category' => 'ريادة أعمال', 'duration_hours' => 30, 'price' => 1500, 'instructor' => 'أ. ليلى أحمد', 'level' => 'مبتدئ', 'is_featured' => false, 'is_active' => true]);
        
        WomenSuccessStory::create(['title' => 'من حلم إلى واقع', 'story' => 'قصة نجاحي في بناء شركتي الخاصة من الصفر...', 'woman_name' => 'فاطمة علي', 'achievement' => 'مؤسسة شركة تقنية', 'field' => 'تكنولوجيا', 'is_featured' => true, 'is_active' => true]);
        WomenSuccessStory::create(['title' => 'التحدي والإصرار', 'story' => 'كيف تغلبت على الصعوبات ووصلت للقمة...', 'woman_name' => 'نورا خالد', 'achievement' => 'مديرة تنفيذية', 'field' => 'إدارة', 'is_featured' => false, 'is_active' => true]);
        
        LeadershipSkill::create(['skill_name' => 'اتخاذ القرارات الحكيمة', 'description' => 'تعلمي كيف تتخذين قرارات صائبة', 'category' => 'قيادة', 'learning_points' => 'التحليل - التقييم - التنفيذ', 'is_active' => true]);
        LeadershipSkill::create(['skill_name' => 'إدارة الفرق', 'description' => 'مهارات قيادة وإدارة فريق العمل', 'category' => 'إدارة', 'learning_points' => 'التواصل - التحفيز - التنسيق', 'is_active' => true]);
        
        WomenInitiative::create(['initiative_name' => 'شبكة سيدات الأعمال', 'description' => 'شبكة لدعم رائدات الأعمال', 'organizer' => 'مؤسسة تمكين', 'initiative_type' => 'شبكة مهنية', 'contact_email' => 'info@businesswomen.org', 'website_url' => 'https://businesswomen.org', 'members_count' => 500, 'is_active' => true]);
        
        EmpowermentResource::create(['resource_name' => 'دليل المرأة القيادية', 'description' => 'كتاب إلكتروني شامل', 'resource_type' => 'كتاب', 'category' => 'قيادة', 'resource_url' => '#', 'is_free' => true, 'is_active' => true]);
        EmpowermentResource::create(['resource_name' => 'قوالب خطة عمل', 'description' => 'نماذج جاهزة لخطط الأعمال', 'resource_type' => 'قالب', 'category' => 'ريادة', 'resource_url' => '#', 'is_free' => true, 'is_active' => true]);
        
        $this->command->info('✅ تم إنشاء بيانات قسم نساء الغد بنجاح!');
    }
}
