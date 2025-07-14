<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyAdvice;

class FamilyAdviceController extends Controller
{
    public function store(Request $request)
    {
        FamilyAdvice::create([
            'title' => $request->input('title'),
            'type' => $request->input('type', 'أخرى'),
            'content' => $request->input('content'),
            'expert_name' => $request->input('expert_name'),
            'category' => $request->input('category', 'أخرى'),
            'target_audience' => $request->input('target_audience', 'الجميع'),
        ]);
        return redirect()->back()->with('message', 'تمت إضافة النصيحة بنجاح!')->withInput(['showAdviceModal' => false]);
    }
}
