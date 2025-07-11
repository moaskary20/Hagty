<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PlasticSurgeon;
use App\Models\PlasticSurgeonTip;
use App\Models\PlasticSurgeonVideoAd;
class PlasticSurgeonController extends Controller {
    public function index(Request $request) {
        $query = PlasticSurgeon::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('title', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%")
                  ->orWhere('clinic_address', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('profile_url', 'like', "%$search%")
                  ;
            });
        }
        if ($request->filled('specialty')) {
            $query->where('specialty', $request->specialty);
        }
        $surgeons = $query->orderBy('name')->get();
        $specialties = PlasticSurgeon::select('specialty')->distinct()->pluck('specialty');
        $tips = PlasticSurgeonTip::latest()->get();
        $videos = PlasticSurgeonVideoAd::latest()->get();
        return view('filament.pages.plastic-surgeons', compact('surgeons','specialties','tips','videos'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'title' => 'nullable',
            'specialty' => 'nullable',
            'clinic_address' => 'nullable',
            'google_maps_url' => 'nullable|url',
            'phone' => 'nullable',
            'profile_url' => 'nullable|url',
        ]);
        PlasticSurgeon::create($data);
        return back()->with('success', 'تم إضافة الطبيب بنجاح');
    }
    public function addTip(Request $request) {
        $data = $request->validate([
            'plastic_surgeon_id' => 'nullable|exists:plastic_surgeons,id',
            'tip' => 'required',
        ]);
        PlasticSurgeonTip::create($data);
        return back()->with('success', 'تم إضافة النصيحة بنجاح');
    }
    public function addVideo(Request $request) {
        $data = $request->validate([
            'plastic_surgeon_id' => 'nullable|exists:plastic_surgeons,id',
            'video_url' => 'required|url',
            'title' => 'nullable',
        ]);
        PlasticSurgeonVideoAd::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        PlasticSurgeon::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الطبيب بنجاح');
    }
}
