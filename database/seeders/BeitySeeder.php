<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\HomeDecor;
use App\Models\FurnitureItem;
use App\Models\DesignIdea;

class BeitySeeder extends Seeder {
    public function run(): void {
        $this->command->info('🏠 إنشاء بيانات قسم بيتي...');
        
        HomeDecor::create(['title' => 'مزهرية خزفية فاخرة', 'description' => 'مزهرية خزفية بتصميم عصري تضيف لمسة جمالية لمنزلك', 'category' => 'إكسسوارات', 'price' => 350, 'is_featured' => true, 'is_active' => true]);
        HomeDecor::create(['title' => 'لوحة فنية جدارية', 'description' => 'لوحة فنية بألوان زاهية مناسبة للصالة', 'category' => 'لوحات', 'price' => 800, 'is_featured' => false, 'is_active' => true]);
        HomeDecor::create(['title' => 'ساعة حائط كلاسيكية', 'description' => 'ساعة حائط بتصميم كلاسيكي أنيق', 'category' => 'إكسسوارات', 'price' => 450, 'is_featured' => false, 'is_active' => true]);
        
        FurnitureItem::create(['title' => 'كنبة زاوية حديثة', 'description' => 'كنبة زاوية مريحة بتصميم عصري', 'category' => 'أثاث صالة', 'room_type' => 'صالة', 'price' => 12000, 'material' => 'قماش', 'color' => 'رمادي', 'is_featured' => true, 'is_active' => true]);
        FurnitureItem::create(['title' => 'طاولة طعام خشبية', 'description' => 'طاولة طعام من الخشب الطبيعي ل6 أشخاص', 'category' => 'أثاث مطبخ', 'room_type' => 'مطبخ', 'price' => 8500, 'material' => 'خشب', 'color' => 'بني', 'is_featured' => false, 'is_active' => true]);
        FurnitureItem::create(['title' => 'سرير مودرن مع تخزين', 'description' => 'سرير عملي مع أدراج تخزين', 'category' => 'أثاث غرفة نوم', 'room_type' => 'غرفة نوم', 'price' => 9500, 'material' => 'خشب MDF', 'color' => 'أبيض', 'is_featured' => true, 'is_active' => true]);
        
        DesignIdea::create(['title' => 'تصميم صالة مودرن مينيمال', 'content' => 'أفكار لتصميم صالة عصرية بسيطة وأنيقة باستخدام الألوان المحايدة والإضاءة الذكية', 'category' => 'صالة', 'room_type' => 'صالة', 'style' => 'مودرن', 'is_featured' => true, 'is_active' => true]);
        DesignIdea::create(['title' => 'ديكور غرفة نوم رومانسية', 'content' => 'نصائح لتحويل غرفة نومك لواحة رومانسية هادئة', 'category' => 'غرفة نوم', 'room_type' => 'غرفة نوم', 'style' => 'رومانسي', 'is_featured' => false, 'is_active' => true]);
        DesignIdea::create(['title' => 'مطبخ عصري عملي', 'content' => 'أفكار لتصميم مطبخ عملي وجميل يجمع بين الأناقة والوظيفية', 'category' => 'مطبخ', 'room_type' => 'مطبخ', 'style' => 'عصري', 'is_featured' => false, 'is_active' => true]);
        
        $this->command->info('✅ تم إنشاء بيانات قسم بيتي بنجاح!');
    }
}
