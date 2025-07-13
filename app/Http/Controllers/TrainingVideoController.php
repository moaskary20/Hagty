<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TrainingVideo;
class TrainingVideoController extends Controller {
    public function index(Request $request) {
        $query = TrainingVideo::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%$search%")
                  ->orWhere('sector', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%")
                  ;
        }
        if ($request->filled('sector')) {
            $query->where('sector', $request->sector);
        }
        $videos = $query->orderBy('created_at', 'desc')->get();
        $sectors = TrainingVideo::select('sector')->distinct()->pluck('sector');
        return view('filament.pages.training-videos', compact('videos','sectors'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'video_url' => 'required|url',
            'course_link' => 'nullable|url',
            'sector' => 'nullable',
            'description' => 'nullable',
        ]);
        TrainingVideo::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        TrainingVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الفيديو بنجاح');
    }
}
