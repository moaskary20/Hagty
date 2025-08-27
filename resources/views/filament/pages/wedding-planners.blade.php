{{-- صفحة منظّمي حفلات الزفاف --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">منظّمي حفلات الزفاف</h3>
        <!-- زر إضافة منظم -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="document.getElementById('addPlannerForm').style.display='block'">
                + إضافة منظم جديد
            </button>
        </div>
        <!-- البحث -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بالاسم أو العلامة التجارية أو مكان العرض..." class="fi-input w-48">
            <button type="submit" class="fi-btn bg-pink-400">بحث</button>
        </form>
        <!-- نموذج إضافة منظم -->
        <div id="addPlannerForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-planners.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <input type="text" name="name" placeholder="اسم المنظم" class="fi-input" required>
                <input type="text" name="brand" placeholder="العلامة التجارية (اختياري)" class="fi-input">
                <input type="text" name="location" placeholder="الموقع (نص أو عنوان)" class="fi-input">
                <input type="url" name="google_maps_url" placeholder="رابط خرائط جوجل (اختياري)" class="fi-input">
                <input type="text" name="phone" placeholder="رقم الهاتف" class="fi-input">
                <input type="url" name="profile_url" placeholder="رابط الصفحة أو المتجر الإلكتروني" class="fi-input">
                <input type="text" name="package" placeholder="الباقة (اختياري)" class="fi-input">
                <input type="text" name="venue" placeholder="مكان العرض (اختياري)" class="fi-input">
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="document.getElementById('addPlannerForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- جدول المنظمين -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة منظّمي حفلات الزفاف</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>اسم المنظم</th>
                        <th>العلامة التجارية</th>
                        <th>الموقع</th>
                        <th>خرائط جوجل</th>
                        <th>رقم الهاتف</th>
                        <th>رابط الصفحة</th>
                        <th>الباقة</th>
                        <th>مكان العرض</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planners as $planner)
                    <tr>
                        <td>{{ $planner->name }}</td>
                        <td>{{ $planner->brand }}</td>
                        <td>{{ $planner->location }}</td>
                        <td>@if($planner->google_maps_url)<a href="{{ $planner->google_maps_url }}" target="_blank" class="text-pink-400 underline">خريطة</a>@else - @endif</td>
                        <td>{{ $planner->phone }}</td>
                        <td>@if($planner->profile_url)<a href="{{ $planner->profile_url }}" target="_blank" class="text-pink-400 underline">صفحة المنظم</a>@else - @endif</td>
                        <td>{{ $planner->package }}</td>
                        <td>{{ $planner->venue }}</td>
                        <td>
                            <form method="POST" action="{{ route('wedding-planners.destroy', $planner->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>
