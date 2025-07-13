<?php

namespace App\Http\Controllers;

use App\Models\WeddingDressDesigner;
use App\Models\DesignerOffer;
use App\Models\DesignerVideoAd;
use App\Models\DesignerBanner;
use App\Models\DesignerReference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeddingDressDesignerController extends Controller
{
    public function index(Request $request)
    {
        $query = WeddingDressDesigner::with(['offers', 'videoAds', 'designBanners', 'references'])
            ->where('is_active', true);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('brand_name', 'like', "%{$search}%")
                  ->orWhere('specialty', 'like', "%{$search}%");
            });
        }

        $designers = $query->orderBy('is_featured', 'desc')
            ->orderBy('rating', 'desc')
            ->paginate(12);

        $videoAds = DesignerVideoAd::with('designer')
            ->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->orderBy('priority_order')
            ->get();

        $banners = DesignerBanner::with('designer')
            ->where('is_active', true)
            ->orderBy('display_order')
            ->get();

        return view('filament.pages.wedding-dress-designers', compact('designers', 'videoAds', 'banners'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'specialty' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'address' => 'nullable|string',
            'phone_numbers' => 'nullable|array',
            'whatsapp_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'google_maps_url' => 'nullable|url',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price_range_min' => 'nullable|numeric|min:0',
            'price_range_max' => 'nullable|numeric|min:0',
            'offers_rentals' => 'boolean',
            'offers_custom_design' => 'boolean',
            'offers_alterations' => 'boolean',
            'available_sizes' => 'nullable|array',
            'dress_styles' => 'nullable|array',
            'fabric_types' => 'nullable|array',
            'is_featured' => 'boolean'
        ]);

        // رفع الصور
        if ($request->hasFile('portfolio_images')) {
            $images = [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('wedding-dress-designers/portfolio', 'public');
                $images[] = $path;
            }
            $validated['portfolio_images'] = $images;
        }

        WeddingDressDesigner::create($validated);

        return redirect()->back()->with('success', 'تم إضافة المصمم بنجاح');
    }

    public function update(Request $request, WeddingDressDesigner $designer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'specialty' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'address' => 'nullable|string',
            'phone_numbers' => 'nullable|array',
            'whatsapp_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'google_maps_url' => 'nullable|url',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price_range_min' => 'nullable|numeric|min:0',
            'price_range_max' => 'nullable|numeric|min:0',
            'offers_rentals' => 'boolean',
            'offers_custom_design' => 'boolean',
            'offers_alterations' => 'boolean',
            'available_sizes' => 'nullable|array',
            'dress_styles' => 'nullable|array',
            'fabric_types' => 'nullable|array',
            'is_featured' => 'boolean'
        ]);

        // رفع الصور الجديدة
        if ($request->hasFile('portfolio_images')) {
            $images = [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('wedding-dress-designers/portfolio', 'public');
                $images[] = $path;
            }
            $validated['portfolio_images'] = array_merge($designer->portfolio_images ?? [], $images);
        }

        $designer->update($validated);

        return redirect()->back()->with('success', 'تم تحديث بيانات المصمم بنجاح');
    }

    public function destroy(WeddingDressDesigner $designer)
    {
        // حذف الصور المرفقة
        if ($designer->portfolio_images) {
            foreach ($designer->portfolio_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $designer->delete();

        return redirect()->back()->with('success', 'تم حذف المصمم بنجاح');
    }

    public function storeOffer(Request $request)
    {
        $validated = $request->validate([
            'wedding_dress_designer_id' => 'required|exists:wedding_dress_designers,id',
            'offer_title' => 'required|string|max:255',
            'offer_description' => 'nullable|string',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'original_price' => 'nullable|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'offer_images' => 'nullable|array',
            'offer_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'terms_conditions' => 'nullable|string',
            'max_uses' => 'nullable|integer|min:1'
        ]);

        // رفع صور العرض
        if ($request->hasFile('offer_images')) {
            $images = [];
            foreach ($request->file('offer_images') as $image) {
                $path = $image->store('designer-offers', 'public');
                $images[] = $path;
            }
            $validated['offer_images'] = $images;
        }

        DesignerOffer::create($validated);

        return redirect()->back()->with('success', 'تم إضافة العرض بنجاح');
    }

    public function storeVideoAd(Request $request)
    {
        $validated = $request->validate([
            'wedding_dress_designer_id' => 'required|exists:wedding_dress_designers,id',
            'sponsor_name' => 'required|string|max:255',
            'sponsor_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ad_title' => 'required|string|max:255',
            'ad_description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'video_file' => 'nullable|mimes:mp4,mov,avi,wmv|max:50000',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sponsor_website' => 'nullable|url',
            'sponsor_contact' => 'nullable|string|max:255',
            'display_duration' => 'nullable|integer|min:5|max:300',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'priority_order' => 'nullable|integer|min:1'
        ]);

        // رفع لوجو الراعي
        if ($request->hasFile('sponsor_logo')) {
            $validated['sponsor_logo'] = $request->file('sponsor_logo')->store('sponsor-logos', 'public');
        }

        // رفع ملف الفيديو
        if ($request->hasFile('video_file')) {
            $validated['video_file'] = $request->file('video_file')->store('video-ads', 'public');
        }

        // رفع صورة مصغرة
        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('video-thumbnails', 'public');
        }

        DesignerVideoAd::create($validated);

        return redirect()->back()->with('success', 'تم إضافة إعلان الفيديو بنجاح');
    }

    public function storeBanner(Request $request)
    {
        $validated = $request->validate([
            'wedding_dress_designer_id' => 'required|exists:wedding_dress_designers,id',
            'banner_title' => 'required|string|max:255',
            'banner_description' => 'nullable|string',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_type' => 'required|string|max:50',
            'link_url' => 'nullable|url',
            'display_order' => 'nullable|integer|min:1'
        ]);

        // رفع صورة اللافتة
        $validated['banner_image'] = $request->file('banner_image')->store('designer-banners', 'public');

        DesignerBanner::create($validated);

        return redirect()->back()->with('success', 'تم إضافة اللافتة بنجاح');
    }

    public function storeReference(Request $request)
    {
        $validated = $request->validate([
            'wedding_dress_designer_id' => 'required|exists:wedding_dress_designers,id',
            'reference_type' => 'required|string|max:50',
            'reference_title' => 'required|string|max:255',
            'reference_url' => 'required|url',
            'reference_description' => 'nullable|string',
            'platform_name' => 'nullable|string|max:100',
            'display_order' => 'nullable|integer|min:1'
        ]);

        DesignerReference::create($validated);

        return redirect()->back()->with('success', 'تم إضافة المرجع بنجاح');
    }

    public function destroyOffer(DesignerOffer $offer)
    {
        if ($offer->offer_images) {
            foreach ($offer->offer_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $offer->delete();

        return redirect()->back()->with('success', 'تم حذف العرض بنجاح');
    }

    public function destroyVideoAd(DesignerVideoAd $videoAd)
    {
        if ($videoAd->sponsor_logo) {
            Storage::disk('public')->delete($videoAd->sponsor_logo);
        }
        if ($videoAd->video_file) {
            Storage::disk('public')->delete($videoAd->video_file);
        }
        if ($videoAd->thumbnail_image) {
            Storage::disk('public')->delete($videoAd->thumbnail_image);
        }

        $videoAd->delete();

        return redirect()->back()->with('success', 'تم حذف إعلان الفيديو بنجاح');
    }

    public function destroyBanner(DesignerBanner $banner)
    {
        Storage::disk('public')->delete($banner->banner_image);
        $banner->delete();

        return redirect()->back()->with('success', 'تم حذف اللافتة بنجاح');
    }

    public function destroyReference(DesignerReference $reference)
    {
        $reference->delete();

        return redirect()->back()->with('success', 'تم حذف المرجع بنجاح');
    }
}
