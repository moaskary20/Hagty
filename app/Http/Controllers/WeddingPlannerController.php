<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WeddingPlanner;
class WeddingPlannerController extends Controller {
    public function index(Request $request) {
        $query = WeddingPlanner::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('brand', 'like', "%$search%")
                  ->orWhere('venue', 'like', "%$search%")
                  ->orWhere('package', 'like', "%$search%")
                  ;
        }
        $planners = $query->orderBy('name')->get();
        return view('filament.pages.wedding-planners', compact('planners'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'brand' => 'nullable',
            'location' => 'nullable',
            'google_maps_url' => 'nullable|url',
            'phone' => 'nullable',
            'profile_url' => 'nullable|url',
            'package' => 'nullable',
            'venue' => 'nullable',
        ]);
        WeddingPlanner::create($data);
        return back()->with('success', 'تم إضافة المنظم بنجاح');
    }
    public function destroy($id) {
        WeddingPlanner::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف المنظم بنجاح');
    }
}
