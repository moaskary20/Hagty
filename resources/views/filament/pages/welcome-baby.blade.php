@php
    $babies = \App\Models\Baby::orderByDesc('id')->get();
@endphp


<x-filament-panels::page>
<div class="welcome-baby-admin-main space-y-6 min-h-screen p-4" style="background: #18181c;">
    <div class="rounded-xl shadow-lg border border-pink-400 p-6" style="background: #23232b;">
        <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white p-4 rounded-t-xl -m-6 mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold">👶 مرحباً بالطفل (لوحة الإدارة)</h2>
            <button type="button" onclick="document.getElementById('addBabyModal').style.display='block'" class="text-pink-200 px-6 py-2 rounded-lg hover:bg-gray-700 border border-pink-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                ➕ إضافة طفل جديد
            </button>
        </div>
        <!-- Modal إضافة طفل جديد -->
        <div id="addBabyModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.7);z-index:9999;">
            <div style="background:#23232b;max-width:400px;margin:10vh auto;padding:2rem;border-radius:16px;position:relative;box-shadow:0 8px 32px rgba(0,0,0,0.25);">
                <h2 style="color:#d81b60;margin-bottom:1rem;">إضافة طفل جديد</h2>
                <form method="POST" action="{{ route('admin.babies.store') }}">
                    @csrf
                    <div class="mb-2">
                        <label class="text-gray-200">اسم الطفل</label>
                        <input type="text" name="name" class="w-full border border-pink-400 rounded px-2 py-1 bg-[#18181c] text-white">
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-200">تاريخ الميلاد</label>
                        <input type="date" name="birth_date" class="w-full border border-pink-400 rounded px-2 py-1 bg-[#18181c] text-white">
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-200">الجنس</label>
                        <select name="gender" class="w-full border border-pink-400 rounded px-2 py-1 bg-[#18181c] text-white">
                            <option value="">اختر</option>
                            <option value="ذكر">ذكر</option>
                            <option value="أنثى">أنثى</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-200">اسم الأم</label>
                        <input type="text" name="mother_name" class="w-full border border-pink-400 rounded px-2 py-1 bg-[#18181c] text-white">
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-200">اسم الأب</label>
                        <input type="text" name="father_name" class="w-full border border-pink-400 rounded px-2 py-1 bg-[#18181c] text-white">
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-200">معلومات صحية</label>
                        <textarea name="health_info" class="w-full border border-pink-400 rounded px-2 py-1 bg-[#18181c] text-white"></textarea>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded">إضافة</button>
                        <button type="button" onclick="document.getElementById('addBabyModal').style.display='none'" class="bg-gray-400 text-white px-4 py-2 rounded">إلغاء</button>
                    </div>
                </form>
                <span onclick="document.getElementById('addBabyModal').style.display='none'" style="position:absolute;top:10px;right:16px;cursor:pointer;font-size:22px;color:#d81b60;">&times;</span>
            </div>
        </div>
        <!-- قائمة الأطفال -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($babies as $baby)
                <div class="border-2 border-pink-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #23232b, #18181c);">
                    <div class="p-6">
                        <h3 class="text-white font-bold text-xl mb-2">{{ $baby->name }}</h3>
                        <p class="text-pink-400 text-sm mb-2">تاريخ الميلاد: {{ $baby->birth_date }}</p>
                        <p class="text-pink-400 text-sm mb-2">الجنس: {{ $baby->gender }}</p>
                        <p class="text-gray-300 text-sm mb-2">اسم الأم: {{ $baby->mother_name }}</p>
                        <p class="text-gray-300 text-sm mb-2">اسم الأب: {{ $baby->father_name }}</p>
                        <p class="text-gray-300 text-sm mb-2">معلومات صحية: {{ $baby->health_info }}</p>
                        <div class="flex gap-2 mt-4">
                            <button onclick="openEditBabyModal('{{ $baby->id }}')" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-blue-600 hover:to-indigo-700 transition-all duration-300">تعديل</button>
                            <form method="POST" action="{{ route('admin.babies.destroy', $baby->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300" onclick="return confirm('هل أنت متأكد من حذف الطفل؟')">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-6xl mb-4">👶</div>
                    <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد بيانات أطفال حالياً</h3>
                    <p class="text-gray-500">سيتم إضافة الأطفال قريباً...</p>
                </div>
            @endforelse
        </div>
    </div>
    {{-- ...يمكنك إضافة أقسام مشابهة للأطباء والحضانات والتطعيمات بنفس التنسيق... --}}
</div>
</x-filament-panels::page>
