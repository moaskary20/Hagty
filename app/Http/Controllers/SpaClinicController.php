<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SpaClinic;
use App\Models\SpaClinicTip;
use App\Models\SpaClinicVideoAd;
class SpaClinicController extends Controller {
    public function index(Request $request) {
        $query = SpaClinic::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%")
                  ->orWhere('center_address', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('profile_url', 'like', "%$search%")
                  ;
            });
        }
        if ($request->filled('specialty')) {
            $query->where('specialty', $request->specialty);
        }
        $clinics = $query->orderBy('name')->get();
        $specialties = SpaClinic::select('specialty')->distinct()->pluck('specialty');
        $tips = SpaClinicTip::latest()->get();
        $videos = SpaClinicVideoAd::latest()->get();
        return view('filament.pages.spa-clinics', compact('clinics','specialties','tips','videos'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'specialty' => 'nullable',
            'center_address' => 'nullable',
            'google_maps_url' => 'nullable|url',
            'phone' => 'nullable',
            'profile_url' => 'nullable|url',
        ]);
        SpaClinic::create($data);
        return back()->with('success', 'تم إضافة العيادة بنجاح');
    }
    public function addTip(Request $request) {
        $data = $request->validate([
            'spa_clinic_id' => 'nullable|exists:spa_clinics,id',
            'tip' => 'required',
        ]);
        SpaClinicTip::create($data);
        return back()->with('success', 'تم إضافة النصيحة بنجاح');
    }
    public function addVideo(Request $request) {
        $data = $request->validate([
            'spa_clinic_id' => 'nullable|exists:spa_clinics,id',
            'video_url' => 'required|url',
            'title' => 'nullable',
        ]);
        SpaClinicVideoAd::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        SpaClinic::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف العيادة بنجاح');
    }
}
