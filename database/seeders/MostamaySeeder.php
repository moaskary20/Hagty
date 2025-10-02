<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{CoachingSession, MotivationalContent, SelfDevelopmentSkill, SuccessStory, CommunityPost};

class MostamaySeeder extends Seeder {
    public function run(): void {
        $this->command->info('🎧 إنشاء بيانات قسم مستمعي...');
        
        CoachingSession::create(['title' => 'جلسة: اكتشف قوتك الداخلية', 'description' => 'جلسة تحفيزية لاكتشاف إمكانياتك الحقيقية', 'coach_name' => 'د. سارة محمد', 'session_type' => 'تحفيز', 'duration_minutes' => 45, 'is_featured' => true, 'is_active' => true]);
        CoachingSession::create(['title' => 'جلسة: التخطيط للنجاح', 'description' => 'كيف تخططين لتحقيق أهدافك', 'coach_name' => 'أ. ليلى أحمد', 'session_type' => 'تخطيط', 'duration_minutes' => 30, 'is_featured' => false, 'is_active' => true]);
        
        MotivationalContent::create(['title' => 'لا تستسلمي أبداً', 'content' => 'كل نجاح عظيم بدأ بخطوة صغيرة...', 'content_type' => 'اقتباس', 'author' => 'فريق HAGTY', 'is_featured' => true, 'is_active' => true]);
        MotivationalContent::create(['title' => 'قوة الإيجابية', 'content' => 'الطاقة الإيجابية تجذب النجاح...', 'content_type' => 'مقال', 'author' => 'د. نورا خالد', 'is_featured' => false, 'is_active' => true]);
        
        SelfDevelopmentSkill::create(['skill_name' => 'إدارة الوقت', 'description' => 'تعلمي كيف تديرين وقتك بفعالية', 'category' => 'إنتاجية', 'steps' => 'تحديد الأولويات - تنظيم المهام - الالتزام', 'is_active' => true]);
        SelfDevelopmentSkill::create(['skill_name' => 'الثقة بالنفس', 'description' => 'بناء ثقتك بنفسك وقدراتك', 'category' => 'تطوير شخصي', 'steps' => 'التقدير الذاتي - التحديات - النجاحات الصغيرة', 'is_active' => true]);
        
        SuccessStory::create(['title' => 'من ربة منزل إلى رائدة أعمال', 'story' => 'بدأت من الصفر والآن أملك مشروعي الخاص...', 'person_name' => 'فاطمة علي', 'category' => 'ريادة أعمال', 'is_featured' => true, 'is_active' => true]);
        SuccessStory::create(['title' => 'تغيير حياتي في 90 يوم', 'story' => 'كيف غيرت روتيني وحياتي بالكامل...', 'person_name' => 'مريم أحمد', 'category' => 'تطوير ذات', 'is_featured' => false, 'is_active' => true]);
        
        CommunityPost::create(['user_id' => 1, 'title' => 'حققت هدفي الأول!', 'content' => 'سعيدة جداً بإنجاز هدفي الأول في التطوير الذاتي', 'post_type' => 'إنجاز', 'likes_count' => 25, 'is_approved' => true, 'is_active' => true]);
        
        $this->command->info('✅ تم إنشاء بيانات قسم مستمعي بنجاح!');
    }
}
