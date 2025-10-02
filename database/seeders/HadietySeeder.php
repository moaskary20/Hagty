<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\GiftIdea;
use App\Models\ShoppingGuide;
use App\Models\PersonalShoppingService;

class HadietySeeder extends Seeder {
    public function run(): void {
        $this->command->info('🎁 إنشاء بيانات قسم هديتي...');
        
        GiftIdea::create(['title' => 'باقة ورد رومانسية', 'description' => 'باقة ورد جميلة مناسبة لجميع المناسبات', 'category' => 'ورود', 'occasion' => 'عيد ميلاد', 'price_range_min' => 200, 'price_range_max' => 500, 'is_featured' => true, 'is_active' => true]);
        
        GiftIdea::create(['title' => 'ساعة يد فاخرة', 'description' => 'ساعة يد أنيقة بتصميم عصري', 'category' => 'إكسسوارات', 'occasion' => 'عيد زواج', 'price_range_min' => 1000, 'price_range_max' => 3000, 'is_featured' => false, 'is_active' => true]);
        
        ShoppingGuide::create(['title' => 'دليل اختيار الهدايا المثالية', 'content' => 'نصائح لاختيار أفضل الهدايا لأحبائك...', 'category' => 'نصائح', 'is_featured' => true, 'is_active' => true]);
        
        PersonalShoppingService::create(['service_name' => 'خدمة التسوق الشخصي VIP', 'description' => 'نساعدك في اختيار وشراء الهدايا المثالية', 'price' => 500, 'contact_email' => 'shopping@hagty.com', 'contact_phone' => '+201001234567', 'is_active' => true]);
        
        $this->command->info('✅ تم إنشاء بيانات قسم هديتي بنجاح!');
    }
}
