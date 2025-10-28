<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TrainingVideo;
class TrainingVideoController extends Controller {
    public function index(Request $request) {
        $query = TrainingVideo::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('عنوان_الفيديو', 'like', "%$search%")
                  ->orWhere('التصنيف', 'like', "%$search%")
                  ->orWhere('وصف_الفيديو', 'like', "%$search%")
                  ;
        }
        if ($request->filled('sector')) {
            $query->where('التصنيف', $request->sector);
        }
        $videos = $query->orderBy('created_at', 'desc')->get();
        $sectors = TrainingVideo::select('التصنيف')->distinct()->whereNotNull('التصنيف')->pluck('التصنيف');
        return view('filament.pages.training-videos', compact('videos','sectors'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'عنوان_الفيديو' => 'required',
            'رابط_الفيديو' => 'required|url',
            'التصنيف' => 'nullable',
            'النوع' => 'nullable',
            'وصف_الفيديو' => 'nullable',
            'صورة_الغلاف' => 'nullable|url',
        ]);
        TrainingVideo::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        TrainingVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الفيديو بنجاح');
    }
}
