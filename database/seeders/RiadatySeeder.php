<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\RiadatyWorkout;
use App\Models\RiadatyPlan;
use App\Models\RiadatyNutrition;
use App\Models\RiadatyExerciseVideo;
use App\Models\RiadatyChallenge;
use Carbon\Carbon;

class RiadatySeeder extends Seeder {
    public function run(): void {
        $this->command->info('🏃‍♀️ إنشاء بيانات قسم رياضتي...');
        
        RiadatyWorkout::create(['title' => 'يوغا صباحية', 'description' => 'تمارين يوغا للاسترخاء والمرونة', 'workout_type' => 'يوغا', 'duration_minutes' => 30, 'difficulty_level' => 'مبتدئ', 'calories_burned' => 120, 'is_active' => true]);
        RiadatyWorkout::create(['title' => 'كارديو مكثف', 'description' => 'تمارين كارديو لحرق الدهون', 'workout_type' => 'كارديو', 'duration_minutes' => 45, 'difficulty_level' => 'متقدم', 'calories_burned' => 350, 'is_active' => true]);
        RiadatyWorkout::create(['title' => 'شد الجسم', 'description' => 'تمارين لشد وتقوية العضلات', 'workout_type' => 'قوة', 'duration_minutes' => 40, 'difficulty_level' => 'متوسط', 'calories_burned' => 200, 'is_active' => true]);
        
        RiadatyPlan::create(['plan_name' => 'خطة 30 يوم للياقة', 'description' => 'خطة شاملة لتحسين اللياقة في شهر', 'plan_type' => 'لياقة عامة', 'duration_weeks' => 4, 'difficulty_level' => 'متوسط', 'is_featured' => true, 'is_active' => true]);
        RiadatyPlan::create(['plan_name' => 'برنامج حرق الدهون', 'description' => 'برنامج مكثف لخسارة الوزن', 'plan_type' => 'خسارة وزن', 'duration_weeks' => 8, 'difficulty_level' => 'متقدم', 'is_featured' => false, 'is_active' => true]);
        
        RiadatyNutrition::create(['title' => 'أفضل وجبات ما قبل التمرين', 'content' => 'نصائح غذائية لزيادة الطاقة قبل التمارين...', 'category' => 'قبل التمرين', 'is_active' => true]);
        RiadatyNutrition::create(['title' => 'التغذية بعد التمرين', 'content' => 'أفضل الأطعمة لتعافي العضلات...', 'category' => 'بعد التمرين', 'is_active' => true]);
        
        RiadatyExerciseVideo::create(['title' => 'تمارين البطن للمبتدئين', 'video_url' => 'https://www.youtube.com/watch?v=example1', 'description' => 'فيديو تعليمي لتمارين البطن', 'exercise_type' => 'بطن', 'duration_minutes' => 15, 'difficulty_level' => 'مبتدئ', 'is_active' => true]);
        RiadatyExerciseVideo::create(['title' => 'تمارين الأرداف', 'video_url' => 'https://www.youtube.com/watch?v=example2', 'description' => 'تمارين فعالة للأرداف', 'exercise_type' => 'أرداف', 'duration_minutes' => 20, 'difficulty_level' => 'متوسط', 'is_active' => true]);
        
        RiadatyChallenge::create(['challenge_name' => 'تحدي 30 يوم بلانك', 'description' => 'تحدي جماعي لزيادة قوة البطن', 'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addDays(30), 'challenge_type' => 'قوة', 'participants_count' => 150, 'prizes' => 'جوائز قيمة للفائزين', 'is_active' => true]);
        RiadatyChallenge::create(['challenge_name' => 'تحدي المشي 10000 خطوة', 'description' => 'تحدي يومي للمشي', 'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonths(1), 'challenge_type' => 'كارديو', 'participants_count' => 320, 'prizes' => 'شهادات تقدير', 'is_active' => true]);
        
        $this->command->info('✅ تم إنشاء بيانات قسم رياضتي بنجاح!');
    }
}
