<?php
namespace App\Http\Controllers;
use App\Models\{EducationalProgram, WomenSuccessStory, LeadershipSkill, WomenInitiative, EmpowermentResource, NesaaAlghadBanner, NesaaAlghadVideo};
use App\BlogHelper;

class NesaaAlghadController extends Controller {
    use BlogHelper;
    public function index() {
        $programs = EducationalProgram::where('is_active', true)->take(6)->get();
        $stories = WomenSuccessStory::where('is_active', true)->take(6)->get();
        $skills = LeadershipSkill::where('is_active', true)->take(6)->get();
        $initiatives = WomenInitiative::where('is_active', true)->take(4)->get();
        $resources = EmpowermentResource::where('is_active', true)->take(6)->get();
        $banners = NesaaAlghadBanner::where('is_active', true)->orderBy('display_order')->get();
        $videos = NesaaAlghadVideo::where('is_active', true)->orderBy('display_order')->get();
        
        // Get latest 3 blogs for nesaa-alghad section
        $latestBlogs = $this->getLatestBlogsForSection('nesaa-alghad', 3);
        
        return view('nesaa-alghad.index', compact('programs', 'stories', 'skills', 'initiatives', 'resources', 'banners', 'videos', 'latestBlogs'));
    }

    public function showStory($id) {
        $story = WomenSuccessStory::where('is_active', true)->findOrFail($id);
        return view('nesaa-alghad.story-details', compact('story'));
    }
}
