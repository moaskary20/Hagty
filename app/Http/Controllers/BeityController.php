<?php
namespace App\Http\Controllers;
use App\Models\HomeDecor;
use App\Models\FurnitureItem;
use App\Models\DesignIdea;
use App\Models\BeityBanner;
use App\Models\BeityVideo;
use App\BlogHelper;

class BeityController extends Controller {
    use BlogHelper;
    public function index() {
        $decors = HomeDecor::where('is_active', true)->paginate(9);
        $furniture = FurnitureItem::where('is_active', true)->take(6)->get();
        $designs = DesignIdea::where('is_active', true)->take(6)->get();
        $banners = BeityBanner::where('is_active', true)->orderBy('display_order')->get();
        $videos = BeityVideo::where('is_active', true)->orderBy('display_order')->get();
        
        // Get latest 3 blogs for beity section
        $latestBlogs = $this->getLatestBlogsForSection('beity', 3);
        
        return view('beity.index', compact('decors', 'furniture', 'designs', 'banners', 'videos', 'latestBlogs'));
    }
    
    public function showDesign($id) {
        $design = DesignIdea::where('is_active', true)->findOrFail($id);
        return view('beity.design-details', compact('design'));
    }
}
