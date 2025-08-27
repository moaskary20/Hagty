<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AccessoratyBannerAd;
class AccessoratyBannerAdController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'banner_image' => 'required|image',
            'banner_link' => 'nullable|url',
        ]);
        $path = $request->file('banner_image')->store('banners', 'public');
        $data['image'] = $path;
        unset($data['banner_image']);
        AccessoratyBannerAd::create($data);
        return back()->with('success', 'تم إضافة البانر بنجاح');
    }
    public function destroy($id) {
        $banner = AccessoratyBannerAd::findOrFail($id);
        \Storage::disk('public')->delete($banner->image);
        $banner->delete();
        return back()->with('success', 'تم حذف البانر بنجاح');
    }
}
