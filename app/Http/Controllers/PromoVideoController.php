<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoVideo;

class PromoVideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
        PromoVideo::create($request->all());
        return redirect()->back()->with('message', 'تم إضافة الفيديو بنجاح');
    }

    public function destroy($id)
    {
        PromoVideo::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'تم حذف الفيديو بنجاح');
    }
}
