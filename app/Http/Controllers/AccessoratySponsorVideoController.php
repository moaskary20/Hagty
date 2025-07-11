<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AccessoratySponsorVideo;
class AccessoratySponsorVideoController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'video_url' => 'required|url',
            'skip_after_seconds' => 'required|integer|min:1|max:60',
        ]);
        AccessoratySponsorVideo::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        AccessoratySponsorVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الفيديو بنجاح');
    }
}
