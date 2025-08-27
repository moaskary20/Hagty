<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeddingHairStylist;

class WeddingHairStylistController extends Controller
{
    public function index(Request $request)
    {
        $query = WeddingHairStylist::query();
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%")
                  ->orWhere('venue', 'like', "%$search%")
                  ->orWhere('package', 'like', "%$search%");
        }
        
        $stylists = $query->where('is_active', true)->orderBy('name')->get();
        
        return view('filament.pages.wedding-hair-stylists', compact('stylists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'google_maps_url' => 'nullable|url',
            'phone' => 'nullable|string|max:20',
            'profile_url' => 'nullable|url',
            'package' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'work_images' => 'nullable|array',
            'work_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة الصور
        if ($request->hasFile('work_images')) {
            $imagePaths = [];
            foreach ($request->file('work_images') as $image) {
                $path = $image->store('wedding_hair_stylists', 'public');
                $imagePaths[] = $path;
            }
            $data['work_images'] = $imagePaths;
        }

        WeddingHairStylist::create($data);

        return back()->with('success', 'تم إضافة مصففة الشعر بنجاح');
    }

    public function update(Request $request, $id)
    {
        $stylist = WeddingHairStylist::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'google_maps_url' => 'nullable|url',
            'phone' => 'nullable|string|max:20',
            'profile_url' => 'nullable|url',
            'package' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'work_images' => 'nullable|array',
            'work_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة الصور الجديدة
        if ($request->hasFile('work_images')) {
            // حذف الصور القديمة
            if ($stylist->work_images) {
                foreach ($stylist->work_images as $imagePath) {
                    \Storage::disk('public')->delete($imagePath);
                }
            }
            
            $imagePaths = [];
            foreach ($request->file('work_images') as $image) {
                $path = $image->store('wedding_hair_stylists', 'public');
                $imagePaths[] = $path;
            }
            $data['work_images'] = $imagePaths;
        }

        $stylist->update($data);

        return back()->with('success', 'تم تعديل مصففة الشعر بنجاح');
    }

    public function destroy($id)
    {
        $stylist = WeddingHairStylist::findOrFail($id);
        
        // حذف الصور من التخزين
        if ($stylist->work_images) {
            foreach ($stylist->work_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $stylist->delete();

        return back()->with('success', 'تم حذف مصففة الشعر بنجاح');
    }
}
