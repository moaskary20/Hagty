{{-- صفحة فناني المكياج في قسم فرحي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">فناني المكياج</h3>
        
        <!-- زر إضافة فنانة مكياج -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="document.getElementById('addArtistForm').style.display='block'">
                + إضافة فنانة مكياج
            </button>
        </div>

        <!-- البحث -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بالاسم أو العنوان..." class="fi-input w-48">
            <button type="submit" class="fi-btn bg-pink-400">بحث</button>
        </form>

        <!-- نموذج إضافة فنانة مكياج -->
        <div id="addArtistForm" style="display:none;">
            <form method="POST" action="{{ route('makeup-artists.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <input type="text" name="name" placeholder="اسم فنانة المكياج" class="fi-input" required>
                <input type="file" name="portfolio_images[]" multiple accept="image/*" class="fi-input" placeholder="صور أعمالها">
                <small class="text-gray-400">يمكنك اختيار عدة صور للأعمال</small>
                <input type="text" name="address" placeholder="العنوان (اختياري)" class="fi-input">
                <input type="url" name="google_maps_url" placeholder="رابط خرائط جوجل (اختياري)" class="fi-input">
                <input type="text" name="phone" placeholder="رقم الهاتف" class="fi-input">
                <input type="url" name="profile_url" placeholder="رابط صفحتها (اختياري)" class="fi-input">
                <textarea name="description" placeholder="وصف إضافي (اختياري)" class="fi-input" rows="3"></textarea>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="document.getElementById('addArtistForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- جدول فناني المكياج -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة فناني المكياج</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>اسم الفنانة</th>
                        <th>صور الأعمال</th>
                        <th>العنوان</th>
                        <th>خرائط جوجل</th>
                        <th>رقم الهاتف</th>
                        <th>رابط الصفحة</th>
                        <th>الوصف</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artists as $artist)
                    <tr>
                        <td>{{ $artist->name }}</td>
                        <td>
                            @if($artist->portfolio_images && count($artist->portfolio_images) > 0)
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @foreach($artist->portfolio_images as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="عمل" class="w-12 h-12 object-cover rounded border">
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-400">لا توجد صور</span>
                            @endif
                        </td>
                        <td>{{ $artist->address ?? '-' }}</td>
                        <td>
                            @if($artist->google_maps_url)
                                <a href="{{ $artist->google_maps_url }}" target="_blank" class="text-pink-400 underline">خريطة</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $artist->phone ?? '-' }}</td>
                        <td>
                            @if($artist->profile_url)
                                <a href="{{ $artist->profile_url }}" target="_blank" class="text-pink-400 underline">صفحة الفنانة</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($artist->description)
                                <span class="text-sm" title="{{ $artist->description }}">{{ Str::limit($artist->description, 30) }}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('makeup-artists.destroy', $artist->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-gray-400 py-8">لا توجد فناني مكياج مسجلين</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(session('success'))
            <div class="mt-4 p-4 bg-green-600 text-white rounded">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-filament::page>
