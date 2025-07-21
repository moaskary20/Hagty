<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baby;

class AdminWelcomeBabyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
        ], [], [
            'name' => 'اسم الطفل',
            'birth_date' => 'تاريخ الميلاد',
            'gender' => 'الجنس',
            'mother_name' => 'اسم الأم',
            'father_name' => 'اسم الأب',
        ]);

        Baby::create($request->only([
            'name',
            'birth_date',
            'gender',
            'mother_name',
            'father_name',
            'health_info',
        ]));


        return redirect()->back()->with('success', 'تم إضافة الطفل بنجاح');
    }

    public function destroy($id)
    {
        $baby = \App\Models\Baby::findOrFail($id);
        $baby->delete();
        return redirect()->back()->with('message', 'تم حذف الطفل بنجاح');
    }
}
