<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DjPerformer;
use App\Models\DjWeddingPackage;
use App\Models\DjBanner;
use App\Models\DjVideoAd;

class DjPerformerController extends Controller
{
    public function index(Request $request)
    {
        $query = DjPerformer::query()->with(['weddingPackages', 'banners', 'videoAds']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%");
        }
        
        $djPerformers = $query->where('is_active', true)->orderBy('name')->get();
        $banners = DjBanner::where('is_active', true)->with('djPerformer')->get();
        $videoAds = DjVideoAd::where('is_active', true)->with('djPerformer')->get();
        $packages = DjWeddingPackage::where('is_active', true)->with('djPerformer')->get();
        
        return view('filament.pages.dj-performers', compact('djPerformers', 'banners', 'videoAds', 'packages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email|max:255',
            'description' => 'nullable|string',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'starting_price' => 'nullable|numeric|min:0',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_videos' => 'nullable|array',
            'portfolio_videos.*' => 'url',
        ]);

        // معالجة صور المراجع
        if ($request->hasFile('portfolio_images')) {
            $imagePaths = [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('dj_performers/portfolio', 'public');
                $imagePaths[] = $path;
            }
            $data['portfolio_images'] = $imagePaths;
        }

        DjPerformer::create($data);

        return back()->with('success', 'تم إضافة مشغل الدي جي بنجاح');
    }

    public function update(Request $request, $id)
    {
        $djPerformer = DjPerformer::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email|max:255',
            'description' => 'nullable|string',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'starting_price' => 'nullable|numeric|min:0',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_videos' => 'nullable|array',
            'portfolio_videos.*' => 'url',
        ]);

        // معالجة صور المراجع الجديدة
        if ($request->hasFile('portfolio_images')) {
            $imagePaths = $djPerformer->portfolio_images ?? [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('dj_performers/portfolio', 'public');
                $imagePaths[] = $path;
            }
            $data['portfolio_images'] = $imagePaths;
        }

        $djPerformer->update($data);

        return back()->with('success', 'تم تحديث مشغل الدي جي بنجاح');
    }

    public function destroy($id)
    {
        $djPerformer = DjPerformer::findOrFail($id);
        
        // حذف الصور من التخزين
        if ($djPerformer->portfolio_images) {
            foreach ($djPerformer->portfolio_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $djPerformer->delete();

        return back()->with('success', 'تم حذف مشغل الدي جي بنجاح');
    }

    // دوال الباقات
    public function storePackage(Request $request)
    {
        $data = $request->validate([
            'dj_performer_id' => 'required|exists:dj_performers,id',
            'package_name' => 'required|string|max:255',
            'package_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:1',
            'includes' => 'nullable|array',
            'includes.*' => 'string',
            'is_popular' => 'boolean',
        ]);

        DjWeddingPackage::create($data);

        return back()->with('success', 'تم إضافة الباقة بنجاح');
    }

    public function destroyPackage($id)
    {
        DjWeddingPackage::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الباقة بنجاح');
    }

    // دوال اللافتات
    public function storeBanner(Request $request)
    {
        $data = $request->validate([
            'dj_performer_id' => 'nullable|exists:dj_performers,id',
            'title' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_url' => 'nullable|url',
            'offer_description' => 'nullable|string',
            'valid_until' => 'nullable|date',
        ]);

        $data['banner_image'] = $request->file('banner_image')->store('dj_banners', 'public');

        DjBanner::create($data);

        return back()->with('success', 'تم إضافة اللافتة بنجاح');
    }

    public function destroyBanner($id)
    {
        $banner = DjBanner::findOrFail($id);
        \Storage::disk('public')->delete($banner->banner_image);
        $banner->delete();

        return back()->with('success', 'تم حذف اللافتة بنجاح');
    }

    // دوال إعلانات الفيديو
    public function storeVideoAd(Request $request)
    {
        $data = $request->validate([
            'dj_performer_id' => 'nullable|exists:dj_performers,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'description' => 'nullable|string',
            'skip_after_seconds' => 'required|integer|min:1|max:60',
        ]);

        DjVideoAd::create($data);

        return back()->with('success', 'تم إضافة إعلان الفيديو بنجاح');
    }

    public function destroyVideoAd($id)
    {
        DjVideoAd::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف إعلان الفيديو بنجاح');
    }
}
