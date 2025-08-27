<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BeautyShop;
use App\Models\BeautyShopBanner;
use App\Models\BeautyShopVideo;
class BeautyShopController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'brand_name' => 'required|string',
            'location' => 'required|url',
            'shop_url' => 'nullable|url',
        ]);
        BeautyShop::create($data);
        return back()->with('success', 'تم إضافة المتجر بنجاح');
    }
    public function storeBanner(Request $request) {
        $data = $request->validate([
            'beauty_shop_id' => 'required|exists:beauty_shops,id',
            'image' => 'required|image',
            'link' => 'nullable|url',
        ]);
        $data['image'] = $request->file('image')->store('beauty_banners', 'public');
        BeautyShopBanner::create($data);
        return back()->with('success', 'تم إضافة البانر بنجاح');
    }
    public function storeVideo(Request $request) {
        $data = $request->validate([
            'beauty_shop_id' => 'required|exists:beauty_shops,id',
            'video_url' => 'required|url',
            'skip_after_seconds' => 'required|integer|min:1|max:60',
        ]);
        BeautyShopVideo::create($data);
        return back()->with('success', 'تم إضافة الفيديو بنجاح');
    }
    public function destroy($id) {
        BeautyShop::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف المتجر بنجاح');
    }
    public function destroyBanner($id) {
        $banner = BeautyShopBanner::findOrFail($id);
        \Storage::disk('public')->delete($banner->image);
        $banner->delete();
        return back()->with('success', 'تم حذف البانر بنجاح');
    }
    public function destroyVideo($id) {
        BeautyShopVideo::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الفيديو بنجاح');
    }
}
