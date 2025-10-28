@php
    $babies = \App\Models\Baby::orderByDesc('id')->get();
@endphp

<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">مرحباً بالطفل</h3>
            <button type="button" onclick="document.getElementById('addBabyModal').style.display='block'" class="fi-btn bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700">
                + إضافة طفل جديد
            </button>
        </div>

        <!-- Modal إضافة طفل جديد -->
        <div id="addBabyModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.5);z-index:9999;">
            <div class="fi-card" style="max-width:500px;margin:10vh auto;padding:2rem;position:relative;">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">إضافة طفل جديد</h2>
                    <button onclick="document.getElementById('addBabyModal').style.display='none'" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                </div>
                <form method="POST" action="{{ route('admin.babies.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="fi-label">اسم الطفل</label>
                        <input type="text" name="name" class="fi-input w-full" required>
                    </div>
                    <div class="mb-4">
                        <label class="fi-label">تاريخ الميلاد</label>
                        <input type="date" name="birth_date" class="fi-input w-full">
                    </div>
                    <div class="mb-4">
                        <label class="fi-label">الجنس</label>
                        <select name="gender" class="fi-input w-full">
                            <option value="">اختر</option>
                            <option value="ذكر">ذكر</option>
                            <option value="أنثى">أنثى</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="fi-label">اسم الأم</label>
                        <input type="text" name="mother_name" class="fi-input w-full">
                    </div>
                    <div class="mb-4">
                        <label class="fi-label">اسم الأب</label>
                        <input type="text" name="father_name" class="fi-input w-full">
                    </div>
                    <div class="mb-4">
                        <label class="fi-label">معلومات صحية</label>
                        <textarea name="health_info" rows="3" class="fi-input w-full"></textarea>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <button type="submit" class="fi-btn bg-pink-600 text-white px-4 py-2 rounded-lg">إضافة</button>
                        <button type="button" onclick="document.getElementById('addBabyModal').style.display='none'" class="fi-btn bg-gray-400 text-white px-4 py-2 rounded-lg">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- قائمة الأطفال -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @forelse($babies as $baby)
                <div class="fi-card p-4">
                    <h3 class="font-bold text-lg mb-2">{{ $baby->name }}</h3>
                    <p class="text-sm text-gray-600 mb-1">تاريخ الميلاد: {{ $baby->birth_date }}</p>
                    <p class="text-sm text-gray-600 mb-1">الجنس: {{ $baby->gender }}</p>
                    <p class="text-sm text-gray-600 mb-1">اسم الأم: {{ $baby->mother_name }}</p>
                    <p class="text-sm text-gray-600 mb-1">اسم الأب: {{ $baby->father_name }}</p>
                    @if($baby->health_info)
                        <p class="text-sm text-gray-600 mb-2">معلومات صحية: {{ $baby->health_info }}</p>
                    @endif
                    <div class="flex gap-2 mt-4">
                        <button onclick="openEditBabyModal('{{ $baby->id }}')" class="fi-btn bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">تعديل</button>
                        <form method="POST" action="{{ route('admin.babies.destroy', $baby->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fi-btn bg-red-600 text-white px-3 py-1 rounded-lg text-sm" onclick="return confirm('هل أنت متأكد من حذف الطفل؟')">حذف</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">لا توجد بيانات أطفال حالياً</p>
                </div>
            @endforelse
        </div>
    </div>
</x-filament::page>
