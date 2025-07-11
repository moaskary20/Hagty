<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AccessoratyShop;
class AccessoratyShopController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'brand_name' => 'required|string',
            'location' => 'required|url',
            'shop_url' => 'nullable|url',
            'category' => 'required|in:ذهبية,فضية,ماسية',
        ]);
        AccessoratyShop::create($data);
        return back()->with('success', 'تم إضافة المتجر بنجاح');
    }
    public function destroy($id) {
        AccessoratyShop::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف المتجر بنجاح');
    }
}
