<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeddingPhotographer;
use App\Models\WeddingPhotographerPackage;
use App\Models\WeddingPhotographerBanner;
use App\Models\WeddingPhotographerVideo;

class WeddingPhotographerController extends Controller
{
    public function index(Request $request)
    {
        $query = WeddingPhotographer::query()->with(['packages', 'banners', 'videos']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%");
        }
        
        $photographers = $query->where('is_active', true)->orderBy('name')->get();
        $banners = WeddingPhotographerBanner::where('is_active', true)->get();
        $videos = WeddingPhotographerVideo::where('is_active', true)->get();
        $packages = WeddingPhotographerPackage::where('is_active', true)->get();
        
        return view('filament.pages.wedding-photographers', compact('photographers', 'banners', 'videos', 'packages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'price_range_min' => 'nullable|numeric|min:0',
            'price_range_max' => 'nullable|numeric|min:0',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_videos' => 'nullable|array',
            'portfolio_videos.*' => 'url',
        ]);

        // معالجة صور الأعمال
        if ($request->hasFile('portfolio_images')) {
            $portfolioPaths = [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('wedding_photographers/portfolio', 'public');
                $portfolioPaths[] = $path;
            }
            $data['portfolio_images'] = $portfolioPaths;
        }

        WeddingPhotographer::create($data);

        return back()->with('success', 'تم إضافة المصور بنجاح');
    }

    public function update(Request $request, $id)
    {
        $photographer = WeddingPhotographer::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'price_range_min' => 'nullable|numeric|min:0',
            'price_range_max' => 'nullable|numeric|min:0',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_videos' => 'nullable|array',
            'portfolio_videos.*' => 'url',
        ]);

        // معالجة صور الأعمال الجديدة
        if ($request->hasFile('portfolio_images')) {
            $portfolioPaths = $photographer->portfolio_images ?? [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('wedding_photographers/portfolio', 'public');
                $portfolioPaths[] = $path;
            }
            $data['portfolio_images'] = $portfolioPaths;
        }

        $photographer->update($data);

        return back()->with('success', 'تم تحديث المصور بنجاح');
    }

    public function destroy($id)
    {
        $photographer = WeddingPhotographer::findOrFail($id);
        
        // حذف الصور من التخزين
        if ($photographer->portfolio_images) {
            foreach ($photographer->portfolio_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $photographer->delete();

        return back()->with('success', 'تم حذف المصور بنجاح');
    }

    public function storePackage(Request $request)
    {
        $data = $request->validate([
            'photographer_id' => 'required|exists:wedding_photographers,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'included_services' => 'nullable|array',
            'included_services.*' => 'string',
            'duration_hours' => 'nullable|integer|min:1',
            'edited_photos_count' => 'nullable|integer|min:0',
            'edited_videos_count' => 'nullable|integer|min:0',
            'includes_album' => 'boolean',
            'includes_usb' => 'boolean',
        ]);

        WeddingPhotographerPackage::create($data);

        return back()->with('success', 'تم إضافة الباقة بنجاح');
    }

    public function destroyPackage($id)
    {
        WeddingPhotographerPackage::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الباقة بنجاح');
    }

    public function storeBanner(Request $request)
    {
        $data = $request->validate([
            'photographer_id' => 'nullable|exists:wedding_photographers,id',
            'title' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_url' => 'nullable|url',
            'offer_description' => 'nullable|string',
            'valid_until' => 'nullable|date',
        ]);

        $data['banner_image'] = $request->file('banner_image')->store('wedding_photographer_banners', 'public');

        WeddingPhotographerBanner::create($data);

        return back()->with('success', 'تم إضافة اللافتة بنجاح');
    }

    public function destroyBanner($id)
    {
        $banner = WeddingPhotographerBanner::findOrFail($id);
        \Storage::disk('public')->delete($banner->banner_image);
        $banner->delete();

        return back()->with('success', 'تم حذف اللافتة بنجاح');
    }

    public function storeVideo(Request $request)
    {
        $data = $request->validate([
            'photographer_id' => 'nullable|exists:wedding_photographers,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'description' => 'nullable|string',
            'skip_after_seconds' => 'required|integer|min:1|max:60',
        ]);

        WeddingPhotographerVideo::create($data);

        return back()->with('success', 'تم إضافة إعلان الفيديو بنجاح');
    }

    public function destroyVideo($id)
    {
        WeddingPhotographerVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف إعلان الفيديو بنجاح');
    }
}
