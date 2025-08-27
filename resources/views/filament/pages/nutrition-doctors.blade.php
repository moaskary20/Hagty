{{-- صفحة أطباء التغذية والحمية --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">أطباء التغذية والحمية</h3>
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="document.getElementById('addDoctorForm').style.display='block'">
                + إضافة طبيب جديد
            </button>
            <button type="button" class="fi-btn bg-pink-600 text-lg px-6 py-2" onclick="document.getElementById('addTipForm').style.display='block'">
                + إضافة نصيحة
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" onclick="document.getElementById('addVideoForm').style.display='block'">
                + إضافة إعلان فيديو
            </button>
        </div>
        <!-- البحث والتصفية -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بالاسم أو التخصص..." class="fi-input w-48">
            <select name="specialty" class="fi-input w-40">
                <option value="">كل التخصصات</option>
                @foreach($specialties as $spec)
                    <option value="{{ $spec }}" {{ request('specialty') == $spec ? 'selected' : '' }}>{{ $spec }}</option>
                @endforeach
            </select>
            <button type="submit" class="fi-btn bg-pink-400">بحث</button>
        </form>
        <!-- نموذج إضافة طبيب -->
        <div id="addDoctorForm" style="display:none;">
            <form method="POST" action="{{ route('nutrition-doctors.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <input type="text" name="name" placeholder="اسم الطبيب" class="fi-input" required>
                <input type="text" name="title" placeholder="اللقب/الدرجة العلمية" class="fi-input">
                <input type="text" name="specialty" placeholder="التخصص" class="fi-input">
                <input type="text" name="clinic_address" placeholder="عنوان العيادة" class="fi-input">
                <input type="url" name="google_maps_url" placeholder="رابط خرائط جوجل" class="fi-input">
                <input type="text" name="phone" placeholder="رقم الهاتف" class="fi-input">
                <input type="url" name="profile_url" placeholder="رابط الصفحة الشخصية" class="fi-input">
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="document.getElementById('addDoctorForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- نموذج إضافة نصيحة -->
        <div id="addTipForm" style="display:none;">
            <form method="POST" action="{{ route('nutrition-doctors.tips') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <select name="nutrition_doctor_id" class="fi-input">
                    <option value="">بدون ربط بطبيب محدد</option>
                    @foreach($doctors as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
                <textarea name="tip" placeholder="النصيحة" class="fi-input" required></textarea>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة النصيحة</button>
                    <button type="button" onclick="document.getElementById('addTipForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- نموذج إضافة فيديو -->
        <div id="addVideoForm" style="display:none;">
            <form method="POST" action="{{ route('nutrition-doctors.videos') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <select name="nutrition_doctor_id" class="fi-input">
                    <option value="">بدون ربط بطبيب محدد</option>
                    @foreach($doctors as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
                <input type="url" name="video_url" placeholder="رابط الفيديو (YouTube أو mp4)" class="fi-input" required>
                <input type="text" name="title" placeholder="عنوان الفيديو (اختياري)" class="fi-input">
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الفيديو</button>
                    <button type="button" onclick="document.getElementById('addVideoForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- جدول الأطباء -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة الأطباء</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>اللقب</th>
                        <th>التخصص</th>
                        <th>عنوان العيادة</th>
                        <th>رقم الهاتف</th>
                        <th>رابط الصفحة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doc)
                    <tr>
                        <td>{{ $doc->name }}</td>
                        <td>{{ $doc->title }}</td>
                        <td>{{ $doc->specialty }}</td>
                        <td>
                            {{ $doc->clinic_address }}
                            @if($doc->google_maps_url)
                                <a href="{{ $doc->google_maps_url }}" target="_blank" class="text-pink-400 underline">خريطة</a>
                            @endif
                        </td>
                        <td>{{ $doc->phone }}</td>
                        <td>@if($doc->profile_url)<a href="{{ $doc->profile_url }}" target="_blank" class="text-pink-400 underline">صفحة الطبيب</a>@else - @endif</td>
                        <td>
                            <form method="POST" action="{{ route('nutrition-doctors.destroy', $doc->id) }}" style="display:inline;">
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
        <!-- نصائح -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">نصائح التغذية والحمية</h4>
            <ul class="list-disc pr-6">
                @foreach($tips as $tip)
                    <li>{{ $tip->tip }} @if($tip->doctor) <span class="text-xs text-gray-400">({{ $tip->doctor->name }})</span> @endif</li>
                @endforeach
            </ul>
        </div>
        <!-- فيديوهات -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">إعلانات فيديو</h4>
            <div class="flex flex-wrap gap-4">
                @foreach($videos as $video)
                    <div class="bg-gray-800 rounded-lg p-2 flex flex-col items-center" style="width: 220px;">
                        <video src="{{ $video->video_url }}" controls style="max-width: 200px; max-height: 120px; border-radius: 6px; margin-bottom: 8px;"></video>
                        <span class="text-xs text-gray-300 mb-1">{{ $video->title }}</span>
                        @if($video->doctor)
                            <span class="text-xs text-gray-400">({{ $video->doctor->name }})</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-filament::page>
