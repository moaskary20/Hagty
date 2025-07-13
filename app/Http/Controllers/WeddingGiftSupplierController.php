<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeddingGiftSupplier;
use App\Models\GiftProductGallery;
use App\Models\GiftSupplierIdea;

class WeddingGiftSupplierController extends Controller
{
    public function index(Request $request)
    {
        $query = WeddingGiftSupplier::query()->with(['productGalleries', 'ideas']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
        }
        
        $giftSuppliers = $query->where('is_active', true)->orderBy('name')->get();
        $galleries = GiftProductGallery::where('is_active', true)->with('giftSupplier')->get();
        $ideas = GiftSupplierIdea::where('is_active', true)->with('giftSupplier')->get();
        
        return view('filament.pages.wedding-gift-suppliers', compact('giftSuppliers', 'galleries', 'ideas'));
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
            'craft_specialties' => 'nullable|array',
            'craft_specialties.*' => 'string',
            'product_categories' => 'nullable|array',
            'product_categories.*' => 'string',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'whatsapp_number' => 'nullable|string|max:20',
            'min_order_price' => 'nullable|numeric|min:0',
            'delivery_days' => 'nullable|integer|min:1',
            'custom_orders' => 'boolean',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور المعرض
        if ($request->hasFile('portfolio_images')) {
            $imagePaths = [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('gift_suppliers/portfolio', 'public');
                $imagePaths[] = $path;
            }
            $data['portfolio_images'] = $imagePaths;
        }

        WeddingGiftSupplier::create($data);

        return back()->with('success', 'تم إضافة مورد الهدايا بنجاح');
    }

    public function update(Request $request, $id)
    {
        $giftSupplier = WeddingGiftSupplier::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'craft_specialties' => 'nullable|array',
            'craft_specialties.*' => 'string',
            'product_categories' => 'nullable|array',
            'product_categories.*' => 'string',
            'website_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'whatsapp_number' => 'nullable|string|max:20',
            'min_order_price' => 'nullable|numeric|min:0',
            'delivery_days' => 'nullable|integer|min:1',
            'custom_orders' => 'boolean',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور المعرض الجديدة
        if ($request->hasFile('portfolio_images')) {
            $imagePaths = $giftSupplier->portfolio_images ?? [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('gift_suppliers/portfolio', 'public');
                $imagePaths[] = $path;
            }
            $data['portfolio_images'] = $imagePaths;
        }

        $giftSupplier->update($data);

        return back()->with('success', 'تم تحديث مورد الهدايا بنجاح');
    }

    public function destroy($id)
    {
        $giftSupplier = WeddingGiftSupplier::findOrFail($id);
        
        // حذف الصور من التخزين
        if ($giftSupplier->portfolio_images) {
            foreach ($giftSupplier->portfolio_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $giftSupplier->delete();

        return back()->with('success', 'تم حذف مورد الهدايا بنجاح');
    }

    // دوال معارض المنتجات
    public function storeGallery(Request $request)
    {
        $data = $request->validate([
            'wedding_gift_supplier_id' => 'required|exists:wedding_gift_suppliers,id',
            'gallery_name' => 'required|string|max:255',
            'gallery_description' => 'nullable|string',
            'product_type' => 'nullable|string|max:255',
            'price_range_min' => 'nullable|numeric|min:0',
            'price_range_max' => 'nullable|numeric|min:0',
            'available_colors' => 'nullable|array',
            'available_colors.*' => 'string',
            'available_sizes' => 'nullable|array',
            'available_sizes.*' => 'string',
            'is_handmade' => 'boolean',
            'is_customizable' => 'boolean',
            'gallery_images' => 'required|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور المعرض
        if ($request->hasFile('gallery_images')) {
            $imagePaths = [];
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('gift_galleries', 'public');
                $imagePaths[] = $path;
            }
            $data['gallery_images'] = $imagePaths;
        }

        GiftProductGallery::create($data);

        return back()->with('success', 'تم إضافة المعرض بنجاح');
    }

    public function destroyGallery($id)
    {
        $gallery = GiftProductGallery::findOrFail($id);
        
        // حذف صور المعرض
        if ($gallery->gallery_images) {
            foreach ($gallery->gallery_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $gallery->delete();
        return back()->with('success', 'تم حذف المعرض بنجاح');
    }

    // دوال الأفكار
    public function storeIdea(Request $request)
    {
        $data = $request->validate([
            'wedding_gift_supplier_id' => 'required|exists:wedding_gift_suppliers,id',
            'idea_title' => 'required|string|max:255',
            'idea_description' => 'required|string',
            'occasion_type' => 'nullable|string|max:255',
            'estimated_price' => 'nullable|numeric|min:0',
            'preparation_days' => 'nullable|integer|min:1',
            'materials_used' => 'nullable|array',
            'materials_used.*' => 'string',
            'is_trending' => 'boolean',
            'idea_images' => 'nullable|array',
            'idea_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة صور الفكرة
        if ($request->hasFile('idea_images')) {
            $imagePaths = [];
            foreach ($request->file('idea_images') as $image) {
                $path = $image->store('gift_ideas', 'public');
                $imagePaths[] = $path;
            }
            $data['idea_images'] = $imagePaths;
        }

        GiftSupplierIdea::create($data);

        return back()->with('success', 'تم إضافة الفكرة بنجاح');
    }

    public function destroyIdea($id)
    {
        $idea = GiftSupplierIdea::findOrFail($id);
        
        // حذف صور الفكرة
        if ($idea->idea_images) {
            foreach ($idea->idea_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $idea->delete();
        return back()->with('success', 'تم حذف الفكرة بنجاح');
    }
}
