<?php
namespace App\Http\Controllers;
use App\Models\RiadatyWorkout;
use App\Models\RiadatyPlan;
use App\Models\RiadatyNutrition;
use App\Models\RiadatyExerciseVideo;
use App\Models\RiadatyChallenge;
use App\Models\RiadatyBanner;
use App\Models\RiadatyVideo;
use App\BlogHelper;

class RiadatyController extends Controller {
    use BlogHelper;
    public function index() {
        $workouts = RiadatyWorkout::where('is_active', true)->take(6)->get();
        $plans = RiadatyPlan::where('is_active', true)->take(3)->get();
        $nutritionTips = RiadatyNutrition::where('is_active', true)->take(6)->get();
        $videos = RiadatyExerciseVideo::where('is_active', true)->take(8)->get();
        $challenges = RiadatyChallenge::where('is_active', true)->where('end_date', '>=', now())->get();
        $banners = RiadatyBanner::where('is_active', true)->orderBy('display_order')->get();
        $promoVideos = RiadatyVideo::where('is_active', true)->orderBy('display_order')->get();
        
        // Get latest 3 blogs for riadaty section
        $latestBlogs = $this->getLatestBlogsForSection('riadaty', 3);
        
        return view('riadaty.index', compact('workouts', 'plans', 'nutritionTips', 'videos', 'challenges', 'banners', 'promoVideos', 'latestBlogs'));
    }
    
    public function startPlan(\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'plan_id' => 'required|exists:riadaty_plans,id',
            'start_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);
        
        // يمكن حفظ بيانات بدء المستخدم للخطة في جدول منفصل
        // أو إرسال بريد إلكتروني للمستخدم بالخطة
        
        return redirect()->route('riadaty.index')->with('success', '🎉 رائع! لقد بدأتِ خطة التدريب. استعدي لرحلة التحول!');
    }
    
    public function joinChallenge(\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'challenge_id' => 'required|exists:riadaty_challenges,id',
            'participant_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'motivation' => 'nullable|string',
        ]);
        
        // زيادة عدد المشاركين في التحدي
        $challenge = RiadatyChallenge::findOrFail($validated['challenge_id']);
        $challenge->increment('participants_count');
        
        // يمكن حفظ بيانات المشارك في جدول منفصل
        
        return redirect()->route('riadaty.index')->with('success', '🏆 مبروك! تم تسجيلك في التحدي. نراكِ في القمة!');
    }
}

