<?php
namespace App\Http\Controllers;
use App\Models\{HealthConsultation, CareerConsultation, FamilyConsultation, BusinessConsultation, PsychologicalSupport, MostasharyBanner, MostasharyVideo};
use App\BlogHelper;

class MostasharyController extends Controller {
    use BlogHelper;
    public function index() {
        $health = HealthConsultation::where('is_active', true)->take(3)->get();
        $career = CareerConsultation::where('is_active', true)->take(3)->get();
        $family = FamilyConsultation::where('is_active', true)->take(3)->get();
        $business = BusinessConsultation::where('is_active', true)->take(3)->get();
        $psychological = PsychologicalSupport::where('is_active', true)->take(3)->get();
        $banners = MostasharyBanner::where('is_active', true)->orderBy('display_order')->get();
        $videos = MostasharyVideo::where('is_active', true)->orderBy('display_order')->get();
        
        // Get latest 3 blogs for mostashary section
        $latestBlogs = $this->getLatestBlogsForSection('mostashary', 3);
        
        return view('mostashary.index', compact('health', 'career', 'family', 'business', 'psychological', 'banners', 'videos', 'latestBlogs'));
    }
}
