<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlowerDecorator;
use App\Models\FlowerWeddingPackage;
use App\Models\FlowerSponsorBanner;
use App\Models\FlowerVideoAd;

class FlowerDecoratorController extends Controller
{
    public function index(Request $request)
    {
        $query = FlowerDecorator::query()->with(['weddingPackages', 'sponsorBanners', 'videoAds']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
        }
        
        $flowerDecorators = $query->where('is_active', true)->orderBy('name')->get();
        $sponsorBanners = FlowerSponsorBanner::where('is_active', true)->with('flowerDecorator')->get();
        $videoAds = FlowerVideoAd::where('is_active', true)->with('flowerDecorator')->get();
        $packages = FlowerWeddingPackage::where('is_active', true)->with('flowerDecorator')->get();
        
        return view('filament.pages.flower-decorators', compact('flowerDecorators', 'sponsorBanners', 'videoAds', 'packages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'starting_price' => 'nullable|numeric|min:0',
            'services_offered' => 'nullable|array',
            'services_offered.*' => 'string',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور المراجع
        if ($request->hasFile('portfolio_images')) {
            $imagePaths = [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('flower_decorators/portfolio', 'public');
                $imagePaths[] = $path;
            }
            $data['portfolio_images'] = $imagePaths;
        }

        FlowerDecorator::create($data);

        return back()->with('success', 'تم إضافة مورد الديكورات بنجاح');
    }

    public function update(Request $request, $id)
    {
        $flowerDecorator = FlowerDecorator::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'starting_price' => 'nullable|numeric|min:0',
            'services_offered' => 'nullable|array',
            'services_offered.*' => 'string',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور المراجع الجديدة
        if ($request->hasFile('portfolio_images')) {
            $imagePaths = $flowerDecorator->portfolio_images ?? [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('flower_decorators/portfolio', 'public');
                $imagePaths[] = $path;
            }
            $data['portfolio_images'] = $imagePaths;
        }

        $flowerDecorator->update($data);

        return back()->with('success', 'تم تحديث مورد الديكورات بنجاح');
    }

    public function destroy($id)
    {
        $flowerDecorator = FlowerDecorator::findOrFail($id);
        
        // حذف الصور من التخزين
        if ($flowerDecorator->portfolio_images) {
            foreach ($flowerDecorator->portfolio_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $flowerDecorator->delete();

        return back()->with('success', 'تم حذف مورد الديكورات بنجاح');
    }

    // دوال الباقات
    public function storePackage(Request $request)
    {
        $data = $request->validate([
            'flower_decorator_id' => 'required|exists:flower_decorators,id',
            'package_name' => 'required|string|max:255',
            'package_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'package_type' => 'nullable|string|max:255',
            'includes' => 'nullable|array',
            'includes.*' => 'string',
            'package_images' => 'nullable|array',
            'package_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_popular' => 'boolean',
        ]);

        // معالجة صور الباقة
        if ($request->hasFile('package_images')) {
            $imagePaths = [];
            foreach ($request->file('package_images') as $image) {
                $path = $image->store('flower_packages', 'public');
                $imagePaths[] = $path;
            }
            $data['package_images'] = $imagePaths;
        }

        FlowerWeddingPackage::create($data);

        return back()->with('success', 'تم إضافة الباقة بنجاح');
    }

    public function destroyPackage($id)
    {
        $package = FlowerWeddingPackage::findOrFail($id);
        
        // حذف صور الباقة
        if ($package->package_images) {
            foreach ($package->package_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $package->delete();
        return back()->with('success', 'تم حذف الباقة بنجاح');
    }

    // دوال اللافتات الراعية
    public function storeSponsorBanner(Request $request)
    {
        $data = $request->validate([
            'flower_decorator_id' => 'nullable|exists:flower_decorators,id',
            'title' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sponsor_company' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
            'offer_description' => 'nullable|string',
            'valid_until' => 'nullable|date',
        ]);

        $data['banner_image'] = $request->file('banner_image')->store('flower_sponsor_banners', 'public');

        FlowerSponsorBanner::create($data);

        return back()->with('success', 'تم إضافة اللافتة الراعية بنجاح');
    }

    public function destroySponsorBanner($id)
    {
        $banner = FlowerSponsorBanner::findOrFail($id);
        \Storage::disk('public')->delete($banner->banner_image);
        $banner->delete();

        return back()->with('success', 'تم حذف اللافتة الراعية بنجاح');
    }

    // دوال إعلانات الفيديو
    public function storeVideoAd(Request $request)
    {
        $data = $request->validate([
            'flower_decorator_id' => 'nullable|exists:flower_decorators,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'description' => 'nullable|string',
            'skip_after_seconds' => 'required|integer|min:1|max:60',
        ]);

        FlowerVideoAd::create($data);

        return back()->with('success', 'تم إضافة إعلان الفيديو بنجاح');
    }

    public function destroyVideoAd($id)
    {
        FlowerVideoAd::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف إعلان الفيديو بنجاح');
    }
}
