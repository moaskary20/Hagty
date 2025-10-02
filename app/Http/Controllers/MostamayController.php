<?php
namespace App\Http\Controllers;
use App\Models\{CoachingSession, MotivationalContent, SelfDevelopmentSkill, SuccessStory, CommunityPost, MostamayBanner, MostamayVideo};
use App\BlogHelper;

class MostamayController extends Controller {
    use BlogHelper;
    public function index() {
        $sessions = CoachingSession::where('is_active', true)->take(6)->get();
        $motivational = MotivationalContent::where('is_active', true)->take(6)->get();
        $skills = SelfDevelopmentSkill::where('is_active', true)->take(6)->get();
        $stories = SuccessStory::where('is_active', true)->take(6)->get();
        $posts = CommunityPost::where('is_active', true)->where('is_approved', true)->orderBy('created_at', 'desc')->take(6)->get();
        $banners = MostamayBanner::where('is_active', true)->orderBy('display_order')->get();
        $videos = MostamayVideo::where('is_active', true)->orderBy('display_order')->get();
        
        // Get latest 3 blogs for mostamay section
        $latestBlogs = $this->getLatestBlogsForSection('mostamay', 3);
        
        return view('mostamay.index', compact('sessions', 'motivational', 'skills', 'stories', 'posts', 'banners', 'videos', 'latestBlogs'));
    }

    public function showMotivational($id) {
        $content = MotivationalContent::where('is_active', true)->findOrFail($id);
        return view('mostamay.motivational-details', compact('content'));
    }

    public function showSkill($id) {
        $skill = SelfDevelopmentSkill::where('is_active', true)->findOrFail($id);
        return view('mostamay.skill-details', compact('skill'));
    }

    public function showStory($id) {
        $story = SuccessStory::where('is_active', true)->findOrFail($id);
        return view('mostamay.story-details', compact('story'));
    }

    public function showPost($id) {
        $post = CommunityPost::where('is_active', true)->where('is_approved', true)->findOrFail($id);
        return view('mostamay.post-details', compact('post'));
    }
}
