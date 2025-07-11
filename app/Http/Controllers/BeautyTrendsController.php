<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BeautyTip;
use App\Models\HairBlogVideo;
class BeautyTrendsController extends Controller {
    public function storeTip(Request $request) {
        $data = $request->validate([
            'tip' => 'required|string',
        ]);
        BeautyTip::create($data);
        return back()->with('success', 'تم إضافة النصيحة بنجاح');
    }
    public function storeVideo(Request $request) {
        $data = $request->validate([
            'video_title' => 'required|string',
            'video_text' => 'required|string',
            'video_url' => 'required|url',
        ]);
        HairBlogVideo::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroyTip($id) {
        BeautyTip::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف النصيحة بنجاح');
    }
    public function destroyVideo($id) {
        HairBlogVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الفيديو بنجاح');
    }
}
