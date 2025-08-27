<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HairStylist;
use App\Models\HairStylistVideo;
class HairStylistController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'works_images' => 'required',
            'location' => 'nullable|url',
            'phone' => 'required|string',
            'profile_url' => 'nullable|url',
        ]);
        $images = [];
        if($request->hasFile('works_images')) {
            foreach($request->file('works_images') as $img) {
                $images[] = $img->store('hair_works', 'public');
            }
        }
        $data['works_images'] = $images;
        HairStylist::create($data);
        return back()->with('success', 'تم إضافة مصففة الشعر بنجاح');
    }
    public function storeVideo(Request $request) {
        $data = $request->validate([
            'hair_stylist_id' => 'required|exists:hair_stylists,id',
            'video_url' => 'required|url',
        ]);
        HairStylistVideo::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        HairStylist::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف مصففة الشعر بنجاح');
    }
    public function destroyVideo($id) {
        HairStylistVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الفيديو بنجاح');
    }
}
