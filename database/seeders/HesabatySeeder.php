<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Income;
use App\Models\Expense;
use App\Models\SavingsGoal;
use App\Models\BillReminder;
use App\Models\User;
use Carbon\Carbon;

class HesabatySeeder extends Seeder {
    public function run(): void {
        $this->command->info('💰 إنشاء بيانات قسم حساباتى...');
        
        // الحصول على مستخدم admin أو إنشاء واحد للتجربة
        $user = User::where('email', 'mo.askary@gmail.com')->first();
        if (!$user) {
            $this->command->warn('⚠️ لم يتم العثور على المستخدم mo.askary@gmail.com');
            $user = User::first(); // استخدام أول مستخدم
            if (!$user) {
                $this->command->error('❌ لا يوجد مستخدمين في النظام!');
                return;
            }
        }
        
        $userId = $user->id;
        $this->command->info("👤 استخدام المستخدم: {$user->name} (ID: {$userId})");
        
        // الدخل
        Income::create(['user_id' => $userId, 'amount' => 15000, 'source' => 'راتب شهر أكتوبر', 'category' => 'راتب', 'income_date' => Carbon::now(), 'is_recurring' => true, 'notes' => 'الراتب الشهري']);
        Income::create(['user_id' => $userId, 'amount' => 3000, 'source' => 'مشروع جانبي', 'category' => 'أعمال حرة', 'income_date' => Carbon::now()->subDays(5), 'is_recurring' => false]);
        Income::create(['user_id' => $userId, 'amount' => 2000, 'source' => 'بونص', 'category' => 'مكافأة', 'income_date' => Carbon::now()->subDays(15), 'is_recurring' => false, 'notes' => 'مكافأة الأداء المتميز']);
        
        $this->command->info('✅ تم إضافة الدخل');
        
        // المصروفات
        Expense::create(['user_id' => $userId, 'amount' => 2500, 'category' => 'طعام وشراب', 'description' => 'مشتريات البقالة الشهرية', 'expense_date' => Carbon::now(), 'payment_method' => 'نقدي']);
        Expense::create(['user_id' => $userId, 'amount' => 800, 'category' => 'مواصلات', 'description' => 'بنزين ومواصلات', 'expense_date' => Carbon::now()->subDays(2), 'payment_method' => 'بطاقة']);
        Expense::create(['user_id' => $userId, 'amount' => 1500, 'category' => 'فواتير', 'description' => 'فاتورة الكهرباء', 'expense_date' => Carbon::now()->subDays(5), 'payment_method' => 'تحويل بنكي']);
        Expense::create(['user_id' => $userId, 'amount' => 600, 'category' => 'ترفيه', 'description' => 'عشاء في مطعم', 'expense_date' => Carbon::now()->subDays(3), 'payment_method' => 'نقدي']);
        Expense::create(['user_id' => $userId, 'amount' => 3000, 'category' => 'تسوق', 'description' => 'ملابس جديدة', 'expense_date' => Carbon::now()->subDays(7), 'payment_method' => 'بطاقة']);
        Expense::create(['user_id' => $userId, 'amount' => 450, 'category' => 'صحة', 'description' => 'أدوية وفيتامينات', 'expense_date' => Carbon::now()->subDays(8), 'payment_method' => 'نقدي']);
        Expense::create(['user_id' => $userId, 'amount' => 1200, 'category' => 'تعليم', 'description' => 'مصاريف المدرسة', 'expense_date' => Carbon::now()->subDays(10), 'payment_method' => 'تحويل بنكي']);
        Expense::create(['user_id' => $userId, 'amount' => 350, 'category' => 'اشتراكات', 'description' => 'Netflix و Spotify', 'expense_date' => Carbon::now()->subDays(4), 'payment_method' => 'بطاقة']);
        Expense::create(['user_id' => $userId, 'amount' => 900, 'category' => 'منزل', 'description' => 'منظفات ومستلزمات المنزل', 'expense_date' => Carbon::now()->subDays(6), 'payment_method' => 'نقدي']);
        
        $this->command->info('✅ تم إضافة المصروفات');
        
        // أهداف الادخار
        SavingsGoal::create(['user_id' => $userId, 'goal_name' => 'شراء ذهب', 'target_amount' => 20000, 'current_amount' => 8000, 'deadline' => Carbon::now()->addMonths(6), 'is_completed' => false]);
        SavingsGoal::create(['user_id' => $userId, 'goal_name' => 'رحلة صيفية', 'target_amount' => 15000, 'current_amount' => 5500, 'deadline' => Carbon::now()->addMonths(8), 'is_completed' => false]);
        SavingsGoal::create(['user_id' => $userId, 'goal_name' => 'تجهيزات منزل', 'target_amount' => 50000, 'current_amount' => 12000, 'deadline' => Carbon::now()->addYear(), 'is_completed' => false]);
        
        $this->command->info('✅ تم إضافة أهداف الادخار');
        
        // تذكيرات الفواتير
        BillReminder::create(['user_id' => $userId, 'bill_name' => 'فاتورة المياه', 'amount' => 120, 'due_date' => Carbon::now()->addDays(3), 'category' => 'فواتير', 'is_recurring' => true, 'is_paid' => false]);
        BillReminder::create(['user_id' => $userId, 'bill_name' => 'فاتورة الإنترنت', 'amount' => 250, 'due_date' => Carbon::now()->addDays(5), 'category' => 'فواتير', 'is_recurring' => true, 'is_paid' => false]);
        BillReminder::create(['user_id' => $userId, 'bill_name' => 'قسط السيارة', 'amount' => 2000, 'due_date' => Carbon::now()->addDays(10), 'category' => 'أقساط', 'is_recurring' => true, 'is_paid' => false]);
        BillReminder::create(['user_id' => $userId, 'bill_name' => 'اشتراك الجيم', 'amount' => 500, 'due_date' => Carbon::now()->addDays(15), 'category' => 'اشتراكات', 'is_recurring' => true, 'is_paid' => false]);
        
        $this->command->info('✅ تم إضافة تذكيرات الفواتير');
        
        $this->command->info('');
        $this->command->info('📊 ملخص البيانات:');
        $this->command->info("   💵 إجمالي الدخل: " . number_format(Income::where('user_id', $userId)->sum('amount')) . " جنيه");
        $this->command->info("   💸 إجمالي المصروفات: " . number_format(Expense::where('user_id', $userId)->sum('amount')) . " جنيه");
        $this->command->info("   💰 الرصيد: " . number_format(Income::where('user_id', $userId)->sum('amount') - Expense::where('user_id', $userId)->sum('amount')) . " جنيه");
        $this->command->info('');
        $this->command->info('✅ تم إنشاء بيانات قسم حساباتى بنجاح!');
    }
}
