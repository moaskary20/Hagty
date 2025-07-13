<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MakeupArtist;

class MakeupArtistController extends Controller
{
    public function index(Request $request)
    {
        $query = MakeupArtist::query();
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        }
        
        $artists = $query->where('is_active', true)->orderBy('name')->get();
        
        return view('filament.pages.makeup-artists', compact('artists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'google_maps_url' => 'nullable|url',
            'phone' => 'nullable|string|max:20',
            'profile_url' => 'nullable|url',
            'description' => 'nullable|string',
            'portfolio_images' => 'nullable|array',
            'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة الصور
        if ($request->hasFile('portfolio_images')) {
            $imagePaths = [];
            foreach ($request->file('portfolio_images') as $image) {
                $path = $image->store('makeup_artists', 'public');
                $imagePaths[] = $path;
            }
            $data['portfolio_images'] = $imagePaths;
        }

        MakeupArtist::create($data);

        return back()->with('success', 'تم إضافة فنانة المكياج بنجاح');
    }

    public function destroy($id)
    {
        $artist = MakeupArtist::findOrFail($id);
        
        // حذف الصور من التخزين
        if ($artist->portfolio_images) {
            foreach ($artist->portfolio_images as $imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
        }
        
        $artist->delete();

        return back()->with('success', 'تم حذف فنانة المكياج بنجاح');
    }
}
