<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CateringService;
use App\Models\CateringMenu;
use App\Models\CateringPackage;
use App\Models\CateringBanner;
use App\Models\CateringVideo;

class CateringServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = CateringService::query()->with(['menus', 'packages', 'banners', 'videos']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('company_name', 'like', "%$search%")
                  ->orWhere('contact_person', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
        }
        
        $services = $query->where('is_active', true)->orderBy('company_name')->get();
        $banners = CateringBanner::where('is_active', true)->with('cateringService')->get();
        $videos = CateringVideo::where('is_active', true)->with('cateringService')->get();
        $menus = CateringMenu::where('is_available', true)->with('cateringService')->get();
        $packages = CateringPackage::where('is_active', true)->with('cateringService')->get();
        
        return view('filament.pages.catering-services', compact('services', 'banners', 'videos', 'menus', 'packages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email',
            'website_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'description' => 'nullable|string',
            'specialties' => 'nullable|array',
            'specialties.*' => 'string',
            'min_order_value' => 'nullable|numeric|min:0',
            'min_guests' => 'nullable|integer|min:1',
            'service_images' => 'nullable|array',
            'service_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور الخدمة
        if ($request->hasFile('service_images')) {
            $imagePaths = [];
            foreach ($request->file('service_images') as $image) {
                $path = $image->store('catering_services', 'public');
                $imagePaths[] = $path;
            }
            $data['service_images'] = $imagePaths;
        }

        CateringService::create($data);

        return back()->with('success', 'تم إضافة شركة خدمات الطعام بنجاح');
    }

    public function update(Request $request, $id)
    {
        $service = CateringService::findOrFail($id);
        
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email',
            'website_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'description' => 'nullable|string',
            'specialties' => 'nullable|array',
            'specialties.*' => 'string',
            'min_order_value' => 'nullable|numeric|min:0',
            'min_guests' => 'nullable|integer|min:1',
            'service_images' => 'nullable|array',
            'service_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور الخدمة الجديدة
        if ($request->hasFile('service_images')) {
            $imagePaths = $service->service_images ?? [];
            foreach ($request->file('service_images') as $image) {
                $path = $image->store('catering_services', 'public');
                $imagePaths[] = $path;
            }
            $data['service_images'] = $imagePaths;
        }

        $service->update($data);

        return back()->with('success', 'تم تحديث شركة خدمات الطعام بنجاح');
    }

    public function destroy($id)
    {
        $service = CateringService::findOrFail($id);
        
        // حذف الصور من التخزين
        if ($service->service_images) {
            foreach ($service->service_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $service->delete();

        return back()->with('success', 'تم حذف شركة خدمات الطعام بنجاح');
    }

    // دوال القوائم
    public function storeMenu(Request $request)
    {
        $data = $request->validate([
            'catering_service_id' => 'required|exists:catering_services,id',
            'menu_name' => 'required|string|max:255',
            'menu_type' => 'required|string',
            'description' => 'nullable|string',
            'menu_items' => 'nullable|array',
            'menu_items.*' => 'string',
            'price_per_person' => 'nullable|numeric|min:0',
            'min_persons' => 'required|integer|min:1',
            'menu_images' => 'nullable|array',
            'menu_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور القائمة
        if ($request->hasFile('menu_images')) {
            $imagePaths = [];
            foreach ($request->file('menu_images') as $image) {
                $path = $image->store('catering_menus', 'public');
                $imagePaths[] = $path;
            }
            $data['menu_images'] = $imagePaths;
        }

        CateringMenu::create($data);

        return back()->with('success', 'تم إضافة القائمة بنجاح');
    }

    public function destroyMenu($id)
    {
        $menu = CateringMenu::findOrFail($id);
        
        if ($menu->menu_images) {
            foreach ($menu->menu_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $menu->delete();

        return back()->with('success', 'تم حذف القائمة بنجاح');
    }

    // دوال الباقات
    public function storePackage(Request $request)
    {
        $data = $request->validate([
            'catering_service_id' => 'required|exists:catering_services,id',
            'package_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'included_items' => 'nullable|array',
            'included_items.*' => 'string',
            'price_per_person' => 'required|numeric|min:0',
            'min_persons' => 'required|integer|min:1',
            'max_persons' => 'nullable|integer|min:1',
            'offer_type' => 'nullable|string',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'offer_valid_until' => 'nullable|date',
            'package_images' => 'nullable|array',
            'package_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
        ]);

        // معالجة صور الباقة
        if ($request->hasFile('package_images')) {
            $imagePaths = [];
            foreach ($request->file('package_images') as $image) {
                $path = $image->store('catering_packages', 'public');
                $imagePaths[] = $path;
            }
            $data['package_images'] = $imagePaths;
        }

        CateringPackage::create($data);

        return back()->with('success', 'تم إضافة الباقة بنجاح');
    }

    public function destroyPackage($id)
    {
        $package = CateringPackage::findOrFail($id);
        
        if ($package->package_images) {
            foreach ($package->package_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $package->delete();

        return back()->with('success', 'تم حذف الباقة بنجاح');
    }

    // دوال اللافتات
    public function storeBanner(Request $request)
    {
        $data = $request->validate([
            'catering_service_id' => 'nullable|exists:catering_services,id',
            'title' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_url' => 'nullable|url',
            'offer_description' => 'nullable|string',
            'valid_until' => 'nullable|date',
        ]);

        $data['banner_image'] = $request->file('banner_image')->store('catering_banners', 'public');

        CateringBanner::create($data);

        return back()->with('success', 'تم إضافة اللافتة بنجاح');
    }

    public function destroyBanner($id)
    {
        $banner = CateringBanner::findOrFail($id);
        \Storage::disk('public')->delete($banner->banner_image);
        $banner->delete();

        return back()->with('success', 'تم حذف اللافتة بنجاح');
    }

    // دوال الفيديوهات
    public function storeVideo(Request $request)
    {
        $data = $request->validate([
            'catering_service_id' => 'nullable|exists:catering_services,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'description' => 'nullable|string',
            'skip_after_seconds' => 'required|integer|min:1|max:60',
        ]);

        CateringVideo::create($data);

        return back()->with('success', 'تم إضافة إعلان الفيديو بنجاح');
    }

    public function destroyVideo($id)
    {
        CateringVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف إعلان الفيديو بنجاح');
    }
}
