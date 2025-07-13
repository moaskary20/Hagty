<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeddingVenue;
use App\Models\WeddingVenueBanner;
use App\Models\WeddingVenueVideo;
use App\Models\WeddingVenueMenu;
use App\Models\WeddingVenuePackage;

class WeddingVenueController extends Controller
{
    public function index(Request $request)
    {
        $query = WeddingVenue::query()->with(['banners', 'videos', 'menus', 'packages']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
        }
        
        $venues = $query->where('is_active', true)->orderBy('name')->get();
        $banners = WeddingVenueBanner::where('is_active', true)->get();
        $videos = WeddingVenueVideo::where('is_active', true)->get();
        $menus = WeddingVenueMenu::where('is_active', true)->with('venue')->get();
        $packages = WeddingVenuePackage::where('is_active', true)->with('venue')->get();
        
        return view('filament.pages.wedding-venues', compact('venues', 'banners', 'videos', 'menus', 'packages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'stars' => 'nullable|integer|min:1|max:5',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'google_maps_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'price_range_min' => 'nullable|numeric|min:0',
            'price_range_max' => 'nullable|numeric|min:0',
            'hall_images' => 'nullable|array',
            'hall_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'outdoor_images' => 'nullable|array',
            'outdoor_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور القاعات
        if ($request->hasFile('hall_images')) {
            $hallPaths = [];
            foreach ($request->file('hall_images') as $image) {
                $path = $image->store('wedding_venues/halls', 'public');
                $hallPaths[] = $path;
            }
            $data['hall_images'] = $hallPaths;
        }

        // معالجة صور الأنشطة الخارجية
        if ($request->hasFile('outdoor_images')) {
            $outdoorPaths = [];
            foreach ($request->file('outdoor_images') as $image) {
                $path = $image->store('wedding_venues/outdoor', 'public');
                $outdoorPaths[] = $path;
            }
            $data['outdoor_images'] = $outdoorPaths;
        }

        WeddingVenue::create($data);

        return back()->with('success', 'تم إضافة الفندق/المكان بنجاح');
    }

    public function storeBanner(Request $request)
    {
        $data = $request->validate([
            'wedding_venue_id' => 'nullable|exists:wedding_venues,id',
            'title' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_url' => 'nullable|url',
            'offer_description' => 'nullable|string',
            'valid_until' => 'nullable|date',
        ]);

        $data['banner_image'] = $request->file('banner_image')->store('wedding_venue_banners', 'public');

        WeddingVenueBanner::create($data);

        return back()->with('success', 'تم إضافة اللافتة بنجاح');
    }

    public function storeVideo(Request $request)
    {
        $data = $request->validate([
            'wedding_venue_id' => 'nullable|exists:wedding_venues,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'description' => 'nullable|string',
            'skip_after_seconds' => 'required|integer|min:1|max:60',
        ]);

        WeddingVenueVideo::create($data);

        return back()->with('success', 'تم إضافة إعلان الفيديو بنجاح');
    }

    public function storeMenu(Request $request)
    {
        $data = $request->validate([
            'wedding_venue_id' => 'required|exists:wedding_venues,id',
            'menu_name' => 'required|string|max:255',
            'menu_type' => 'required|in:appetizers,main_courses,desserts,beverages,custom',
            'description' => 'nullable|string',
            'menu_items' => 'required|array',
            'menu_items.*' => 'string|max:255',
            'price_per_person' => 'required|numeric|min:0',
            'menu_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('menu_image')) {
            $data['menu_image'] = $request->file('menu_image')->store('wedding_venue_menus', 'public');
        }

        WeddingVenueMenu::create($data);

        return back()->with('success', 'تم إضافة قائمة الطعام بنجاح');
    }

    public function storePackage(Request $request)
    {
        $data = $request->validate([
            'wedding_venue_id' => 'required|exists:wedding_venues,id',
            'package_name' => 'required|string|max:255',
            'package_type' => 'required|in:bronze,silver,gold,platinum,custom',
            'description' => 'nullable|string',
            'included_services' => 'required|array',
            'included_services.*' => 'string|max:255',
            'menu_ids' => 'nullable|array',
            'menu_ids.*' => 'exists:wedding_venue_menus,id',
            'price_per_person' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'min_guests' => 'required|integer|min:1',
            'max_guests' => 'required|integer|min:1',
            'package_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'valid_from' => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('package_image')) {
            $data['package_image'] = $request->file('package_image')->store('wedding_venue_packages', 'public');
        }

        WeddingVenuePackage::create($data);

        return back()->with('success', 'تم إضافة الباقة بنجاح');
    }

    public function destroy($id)
    {
        $venue = WeddingVenue::findOrFail($id);
        
        // حذف الصور من التخزين
        if ($venue->hall_images) {
            foreach ($venue->hall_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        if ($venue->outdoor_images) {
            foreach ($venue->outdoor_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $venue->delete();

        return back()->with('success', 'تم حذف الفندق/المكان بنجاح');
    }

    public function destroyBanner($id)
    {
        $banner = WeddingVenueBanner::findOrFail($id);
        \Storage::disk('public')->delete($banner->banner_image);
        $banner->delete();

        return back()->with('success', 'تم حذف اللافتة بنجاح');
    }

    public function destroyVideo($id)
    {
        WeddingVenueVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف إعلان الفيديو بنجاح');
    }

    public function destroyMenu($id)
    {
        $menu = WeddingVenueMenu::findOrFail($id);
        if ($menu->menu_image) {
            \Storage::disk('public')->delete($menu->menu_image);
        }
        $menu->delete();

        return back()->with('success', 'تم حذف قائمة الطعام بنجاح');
    }

    public function destroyPackage($id)
    {
        $package = WeddingVenuePackage::findOrFail($id);
        if ($package->package_image) {
            \Storage::disk('public')->delete($package->package_image);
        }
        $package->delete();

        return back()->with('success', 'تم حذف الباقة بنجاح');
    }

    public function update(Request $request, $id)
    {
        $venue = WeddingVenue::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'stars' => 'nullable|integer|min:1|max:5',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'google_maps_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'price_range_min' => 'nullable|numeric|min:0',
            'price_range_max' => 'nullable|numeric|min:0',
            'hall_images' => 'nullable|array',
            'hall_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'outdoor_images' => 'nullable|array',
            'outdoor_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور القاعات الجديدة
        if ($request->hasFile('hall_images')) {
            $hallPaths = $venue->hall_images ?? [];
            foreach ($request->file('hall_images') as $image) {
                $path = $image->store('wedding_venues/halls', 'public');
                $hallPaths[] = $path;
            }
            $data['hall_images'] = $hallPaths;
        }

        // معالجة صور الأنشطة الخارجية الجديدة
        if ($request->hasFile('outdoor_images')) {
            $outdoorPaths = $venue->outdoor_images ?? [];
            foreach ($request->file('outdoor_images') as $image) {
                $path = $image->store('wedding_venues/outdoor', 'public');
                $outdoorPaths[] = $path;
            }
            $data['outdoor_images'] = $outdoorPaths;
        }

        $venue->update($data);

        return back()->with('success', 'تم تحديث الفندق/المكان بنجاح');
    }
}
