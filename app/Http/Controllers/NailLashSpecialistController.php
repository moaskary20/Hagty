<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NailLashSpecialist;
use App\Models\NailLashSpecialistTip;
use App\Models\NailLashSpecialistVideoAd;
class NailLashSpecialistController extends Controller {
    public function index(Request $request) {
        $query = NailLashSpecialist::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('title', 'like', "%$search%")
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
        $specialists = $query->orderBy('name')->get();
        $specialties = NailLashSpecialist::select('specialty')->distinct()->pluck('specialty');
        $tips = NailLashSpecialistTip::latest()->get();
        $videos = NailLashSpecialistVideoAd::latest()->get();
        return view('filament.pages.nail-lash-specialists', compact('specialists','specialties','tips','videos'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'title' => 'nullable',
            'specialty' => 'nullable',
            'center_address' => 'nullable',
            'google_maps_url' => 'nullable|url',
            'phone' => 'nullable',
            'profile_url' => 'nullable|url',
        ]);
        NailLashSpecialist::create($data);
        return back()->with('success', 'تم إضافة المتخصص بنجاح');
    }
    public function addTip(Request $request) {
        $data = $request->validate([
            'nail_lash_specialist_id' => 'nullable|exists:nail_lash_specialists,id',
            'tip' => 'required',
        ]);
        NailLashSpecialistTip::create($data);
        return back()->with('success', 'تم إضافة النصيحة بنجاح');
    }
    public function addVideo(Request $request) {
        $data = $request->validate([
            'nail_lash_specialist_id' => 'nullable|exists:nail_lash_specialists,id',
            'video_url' => 'required|url',
            'title' => 'nullable',
        ]);
        NailLashSpecialistVideoAd::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        NailLashSpecialist::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف المتخصص بنجاح');
    }
}
