<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ProjectIdea;
use App\Models\BusinessAdvice;
use App\Models\BusinessPlan;
use App\Models\FundingOption;
use App\Models\BusinessResource;

class MashroaySeeder extends Seeder {
    public function run(): void {
        $this->command->info('💼 إنشاء بيانات قسم مشروعي...');
        
        // أفكار المشاريع - البيانات الموجودة بالفعل تم إضافتها يدوياً
        // يمكن إضافة المزيد حسب الحاجة
        $existingIdeas = ProjectIdea::count();
        if ($existingIdeas > 0) {
            $this->command->info("✅ يوجد بالفعل {$existingIdeas} فكرة مشروع في قاعدة البيانات");
        } else {
            // إضافة أفكار بسيطة إذا كانت القاعدة فارغة
            ProjectIdea::create(['title' => 'متجر إلكتروني للمنتجات اليدوية', 'description' => 'إنشاء متجر إلكتروني لبيع المنتجات اليدوية والحرفية.', 'category' => 'تجارة إلكترونية', 'budget_range' => '15,000 - 30,000 جنيه', 'target_audience' => 'النساء 25-45 سنة', 'difficulty_level' => 'متوسط', 'is_featured' => true, 'is_active' => true]);
            ProjectIdea::create(['title' => 'خدمات التصميم الجرافيكي', 'description' => 'تقديم خدمات تصميم من المنزل.', 'category' => 'خدمات', 'budget_range' => '3,000 - 8,000 جنيه', 'target_audience' => 'الشركات الصغيرة', 'difficulty_level' => 'سهل', 'is_active' => true]);
            ProjectIdea::create(['title' => 'مشروع الحلويات المنزلية', 'description' => 'تحضير وبيع الحلويات من المنزل.', 'category' => 'طعام وشراب', 'budget_range' => '5,000 - 12,000 جنيه', 'target_audience' => 'المناسبات والأفراد', 'difficulty_level' => 'سهل', 'is_featured' => true, 'is_active' => true]);
        }
        
        $this->command->info('✅ تم إضافة ' . ProjectIdea::count() . ' فكرة مشروع');
        
        // نصائح ريادة الأعمال
        BusinessAdvice::create([
            'title' => 'كيف تبدأين مشروعك من الصفر بدون رأس مال كبير',
            'content' => 'البداية هي أصعب خطوة في رحلة ريادة الأعمال، لكنها ليست مستحيلة حتى مع رأس مال محدود.

الخطوة الأولى: اكتشفي شغفك ومهاراتك
ابدأي بسؤال نفسك: ما الذي أجيده؟ ما الذي أستمتع بفعله؟ المشروع الناجح غالباً يبدأ من شغف حقيقي.

الخطوة الثانية: ابدأي صغيرة جداً
لا تنتظري رأس المال الضخم. ابدأي بما لديك الآن - حتى لو كان بسيطاً.

الخطوة الثالثة: استثمري في التعلم
قبل أن تستثمري المال، استثمري الوقت في التعلم.

الخطوة الرابعة: استخدمي وسائل التواصل المجانية
فيسبوك، إنستجرام، تيك توك - كلها أدوات تسويقية مجانية وقوية.

نصائح ذهبية:
- ابدأي بالعملاء من حولك
- اطلبي تقييمات وتوصيات
- كوني صبورة - النجاح يحتاج وقتاً',
            'category' => 'البداية',
            'author' => 'د. سارة محمد',
            'is_featured' => true,
            'is_active' => true
        ]);

        BusinessAdvice::create([
            'title' => 'استراتيجيات التسويق الإلكتروني بميزانية محدودة',
            'content' => 'التسويق الإلكتروني لا يحتاج ميزانيات ضخمة إذا عرفتِ كيف تستخدمينه بذكاء.

1. المحتوى هو الملك
2. استخدمي قوة الفيديو
3. تفاعلي مع جمهورك
4. التعاون مع الإنفلونسرز الصغار
5. اعملي إعلانات مدفوعة ذكية',
            'category' => 'تسويق',
            'author' => 'أ. ليلى أحمد',
            'is_featured' => true,
            'is_active' => true
        ]);

        BusinessAdvice::create(['title' => 'إدارة الوقت لرائدات الأعمال', 'content' => 'كيف توازنين بين المشروع والحياة الشخصية والعائلة؟ إليك استراتيجيات عملية للحفاظ على التوازن وزيادة الإنتاجية.', 'category' => 'إدارة', 'author' => 'م. نورا خالد', 'is_active' => true]);
        
        BusinessAdvice::create(['title' => 'بناء فريق عمل قوي', 'content' => 'الفريق هو أساس نجاح أي مشروع. تعلمي كيف تختارين الأشخاص المناسبين وتحفزينهم.', 'category' => 'إدارة', 'author' => 'د. هدى عبدالله', 'is_active' => true]);
        
        $this->command->info('✅ تم إضافة ' . BusinessAdvice::count() . ' نصيحة');
        
        // خطط العمل
        BusinessPlan::create(['plan_name' => 'نموذج خطة عمل شاملة', 'description' => 'قالب جاهز لخطة عمل احترافية تشمل جميع الجوانب.', 'category' => 'عام', 'steps' => '1. الملخص التنفيذي\n2. وصف المشروع\n3. تحليل السوق\n4. الخطة التسويقية\n5. الخطة المالية', 'is_active' => true]);
        
        BusinessPlan::create(['plan_name' => 'خطة مشروع متجر إلكتروني', 'description' => 'خطة متخصصة للتجارة الإلكترونية.', 'category' => 'تجارة إلكترونية', 'is_active' => true]);
        
        BusinessPlan::create(['plan_name' => 'خطة مشروع خدمي', 'description' => 'نموذج للمشاريع الخدمية.', 'category' => 'خدمات', 'is_active' => true]);
        
        $this->command->info('✅ تم إضافة ' . BusinessPlan::count() . ' خطة عمل');
        
        // خيارات التمويل
        FundingOption::create(['funding_type' => 'قروض البنوك', 'description' => 'قروض مصرفية للمشاريع الصغيرة.', 'provider_name' => 'البنك الأهلي', 'funding_range' => '10,000 - 500,000 جنيه', 'requirements' => 'ضمانات - دراسة جدوى', 'contact_info' => '19623', 'website_url' => 'https://nbe.com.eg', 'is_active' => true]);
        
        FundingOption::create(['funding_type' => 'مستثمرون ملائكة', 'description' => 'استثمار من أفراد في مقابل حصة.', 'provider_name' => 'شبكة المستثمرين العرب', 'funding_range' => '50,000 - 1,000,000 جنيه', 'requirements' => 'فكرة مبتكرة - فريق قوي', 'is_active' => true]);
        
        FundingOption::create(['funding_type' => 'صندوق التنمية الاجتماعية', 'description' => 'قروض حسنة بفوائد منخفضة.', 'provider_name' => 'صندوق التنمية', 'funding_range' => '5,000 - 50,000 جنيه', 'contact_info' => '16528', 'is_active' => true]);
        
        $this->command->info('✅ تم إضافة ' . FundingOption::count() . ' خيار تمويل');
        
        // الموارد والأدوات
        BusinessResource::create(['resource_name' => 'Canva للتصميم', 'description' => 'أداة تصميم سهلة.', 'resource_type' => 'أداة', 'category' => 'تصميم', 'resource_url' => 'https://canva.com', 'is_free' => true, 'is_active' => true]);
        BusinessResource::create(['resource_name' => 'Google Analytics', 'description' => 'تحليل الزوار.', 'resource_type' => 'أداة', 'category' => 'تحليلات', 'resource_url' => 'https://analytics.google.com', 'is_free' => true, 'is_active' => true]);
        BusinessResource::create(['resource_name' => 'Trello', 'description' => 'إدارة المهام.', 'resource_type' => 'أداة', 'category' => 'إدارة', 'resource_url' => 'https://trello.com', 'is_free' => true, 'is_active' => true]);
        
        $this->command->info('✅ تم إضافة ' . BusinessResource::count() . ' مورد');
        $this->command->info('✅ تم إنشاء بيانات قسم مشروعي بنجاح!');
    }
}
