<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NutritionDoctor;
use App\Models\NutritionDoctorTip;
use App\Models\NutritionDoctorVideoAd;
class NutritionDoctorController extends Controller {
    public function index(Request $request) {
        $query = NutritionDoctor::query();
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
        $doctors = $query->orderBy('name')->get();
        $specialties = NutritionDoctor::select('specialty')->distinct()->pluck('specialty');
        $tips = NutritionDoctorTip::latest()->get();
        $videos = NutritionDoctorVideoAd::latest()->get();
        return view('filament.pages.nutrition-doctors', compact('doctors','specialties','tips','videos'));
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
        NutritionDoctor::create($data);
        return back()->with('success', 'تم إضافة الطبيب بنجاح');
    }
    public function addTip(Request $request) {
        $data = $request->validate([
            'nutrition_doctor_id' => 'nullable|exists:nutrition_doctors,id',
            'tip' => 'required',
        ]);
        NutritionDoctorTip::create($data);
        return back()->with('success', 'تم إضافة النصيحة بنجاح');
    }
    public function addVideo(Request $request) {
        $data = $request->validate([
            'nutrition_doctor_id' => 'nullable|exists:nutrition_doctors,id',
            'video_url' => 'required|url',
            'title' => 'nullable',
        ]);
        NutritionDoctorVideoAd::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        NutritionDoctor::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الطبيب بنجاح');
    }
}
