<?php
namespace App\Http\Controllers;
use App\Models\ProjectIdea;
use App\Models\BusinessAdvice;
use App\Models\BusinessPlan;
use App\Models\FundingOption;
use App\Models\BusinessResource;
use App\Models\MashroayBanner;
use App\Models\MashroayVideo;
use App\BlogHelper;

class MashroayController extends Controller {
    use BlogHelper;
    public function index() {
        $ideas = ProjectIdea::where('is_active', true)->take(6)->get();
        $advices = BusinessAdvice::where('is_active', true)->take(6)->get();
        $plans = BusinessPlan::where('is_active', true)->take(3)->get();
        $funding = FundingOption::where('is_active', true)->take(4)->get();
        $resources = BusinessResource::where('is_active', true)->take(6)->get();
        $banners = MashroayBanner::where('is_active', true)->orderBy('display_order')->get();
        $videos = MashroayVideo::where('is_active', true)->orderBy('display_order')->get();
        
        // Get latest 3 blogs for mashroay section
        $latestBlogs = $this->getLatestBlogsForSection('mashroay', 3);
        
        return view('mashroay.index', compact('ideas', 'advices', 'plans', 'funding', 'resources', 'banners', 'videos', 'latestBlogs'));
    }
    
    public function showIdea($id) {
        $idea = ProjectIdea::where('is_active', true)->findOrFail($id);
        return view('mashroay.idea-details', compact('idea'));
    }
    
    public function showAdvice($id) {
        $advice = BusinessAdvice::where('is_active', true)->findOrFail($id);
        return view('mashroay.advice-details', compact('advice'));
    }
}
