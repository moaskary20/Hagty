<?php
namespace App\Http\Controllers;
use App\Models\GiftIdea;
use App\Models\ShoppingGuide;
use App\Models\PersonalShoppingService;
use App\Models\HadietyBanner;
use App\Models\HadietyVideo;
use App\BlogHelper;

class HadietyController extends Controller {
    use BlogHelper;
    public function index() {
        $giftIdeas = GiftIdea::where('is_active', true)->paginate(12);
        $guides = ShoppingGuide::where('is_active', true)->take(6)->get();
        $services = PersonalShoppingService::where('is_active', true)->get();
        $banners = HadietyBanner::where('is_active', true)->orderBy('display_order')->get();
        $videos = HadietyVideo::where('is_active', true)->orderBy('display_order')->get();
        
        // Get latest 3 blogs for hadiety section
        $latestBlogs = $this->getLatestBlogsForSection('hadiety', 3);
        
        return view('hadiety.index', compact('giftIdeas', 'guides', 'services', 'banners', 'videos', 'latestBlogs'));
    }
    
    public function showGuide($id) {
        $guide = ShoppingGuide::where('is_active', true)->findOrFail($id);
        return view('hadiety.guide-details', compact('guide'));
    }
    
    public function storeServiceRequest(\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'service_id' => 'required|exists:personal_shopping_services,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'request_details' => 'required|string',
            'preferred_date' => 'nullable|date',
        ]);
        
        // يمكن حفظ الطلب في قاعدة البيانات أو إرسال بريد إلكتروني
        // هنا سنرجع استجابة نجاح فقط
        
        return response()->json([
            'success' => true,
            'message' => 'تم إرسال طلبك بنجاح! سنتواصل معك قريباً.'
        ]);
    }
}
