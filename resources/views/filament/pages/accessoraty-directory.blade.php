{{-- صفحة قسم قائمة متاجر الإكسسوارات --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">دليل متاجر الإكسسوارات</h3>
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="document.getElementById('addShopForm').style.display='block'">
                + إضافة متجر جديد
            </button>
            <button type="button" class="fi-btn bg-pink-600 text-lg px-6 py-2" onclick="document.getElementById('addBannerForm').style.display='block'">
                + إضافة إعلان بانر
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" onclick="document.getElementById('addVideoForm').style.display='block'">
                + إضافة إعلان فيديو
            </button>
        </div>
        <!-- فلتر الفئة -->
        <div class="mb-4 flex flex-row-reverse gap-2 items-center">
            <label for="categoryFilter" class="font-bold">فلتر حسب الفئة:</label>
            <form method="GET" class="inline">
                <select id="categoryFilter" name="category" class="fi-input w-40" onchange="this.form.submit()">
                    <option value="">كل الفئات</option>
                    <option value="ذهبية" {{ request('category') == 'ذهبية' ? 'selected' : '' }}>ذهبية</option>
                    <option value="فضية" {{ request('category') == 'فضية' ? 'selected' : '' }}>فضية</option>
                    <option value="ماسية" {{ request('category') == 'ماسية' ? 'selected' : '' }}>ماسية</option>
                </select>
            </form>
        </div>
        <!-- نموذج إضافة متجر جديد -->
        <div id="addShopForm" style="display:none;">
            <form method="POST" action="{{ route('accessoraty.shops.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <input type="text" name="brand_name" placeholder="اسم العلامة التجارية" class="fi-input" required>
                <input type="url" name="location" placeholder="رابط الموقع (خرائط جوجل)" class="fi-input" required>
                <input type="url" name="shop_url" placeholder="رابط المتجر (اختياري)" class="fi-input">
                <select name="category" class="fi-input" required>
                    <option value="">اختر الفئة</option>
                    <option value="ذهبية">ذهبية</option>
                    <option value="فضية">فضية</option>
                    <option value="ماسية">ماسية</option>
                </select>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="document.getElementById('addShopForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- نموذج إضافة بانر -->
        <div id="addBannerForm" style="display:none;">
            <form method="POST" action="{{ route('accessoraty.banners.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <label>صورة البانر</label>
                <input type="file" name="banner_image" accept="image/*" class="fi-input" required>
                <input type="url" name="banner_link" placeholder="رابط عند الضغط (اختياري)" class="fi-input">
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">حفظ البانر</button>
                    <button type="button" onclick="document.getElementById('addBannerForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- نموذج إضافة فيديو -->
        <div id="addVideoForm" style="display:none;">
            <form method="POST" action="{{ route('accessoraty.videos.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <input type="url" name="video_url" placeholder="رابط الفيديو (YouTube أو mp4)" class="fi-input" required>
                <input type="number" name="skip_after_seconds" placeholder="مدة تخطي الإعلان بالثواني (مثلاً 6)" class="fi-input" min="1" max="60" required>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">حفظ الفيديو</button>
                    <button type="button" onclick="document.getElementById('addVideoForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- عرض البانرات الحالية -->
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">إعلانات البانر الحالية</h4>
            <div class="flex flex-wrap gap-4">
                @foreach($banners as $banner)
                    <div class="bg-gray-800 rounded-lg p-2 flex flex-col items-center" style="width: 180px;">
                        <img src="{{ asset('storage/' . $banner->image) }}" alt="بانر" style="max-width: 150px; max-height: 80px; border-radius: 6px; margin-bottom: 8px;">
                        @if($banner->link)
                            <a href="{{ $banner->link }}" target="_blank" class="text-pink-400 text-xs mb-2">رابط الإعلان</a>
                        @endif
                        <form method="POST" action="{{ route('accessoraty.banners.destroy', $banner->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- عرض فيديوهات الرعاة الحالية -->
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">إعلانات الفيديو الحالية</h4>
            <div class="flex flex-wrap gap-4">
                @foreach($videos as $video)
                    <div class="bg-gray-800 rounded-lg p-2 flex flex-col items-center" style="width: 220px;">
                        <video src="{{ $video->video_url }}" controls style="max-width: 200px; max-height: 120px; border-radius: 6px; margin-bottom: 8px;"
                            ontimeupdate="if(this.currentTime>=({{ $video->skip_after_seconds }})){this.setAttribute('controlsList','nodownload');}"></video>
                        <span class="text-xs text-gray-300 mb-1">مدة تخطي الإعلان: {{ $video->skip_after_seconds }} ثانية</span>
                        <form method="POST" action="{{ route('accessoraty.videos.destroy', $video->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- جدول المتاجر مع الفلتر -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة المتاجر</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>اسم العلامة التجارية</th>
                        <th>الموقع (خرائط جوجل)</th>
                        <th>رابط المتجر</th>
                        <th>الفئة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shops as $shop)
                    @if(!request('category') || request('category') == $shop->category)
                    <tr>
                        <td>{{ $shop->brand_name }}</td>
                        <td><a href="{{ $shop->location }}" target="_blank" class="text-pink-400 underline">رابط الموقع</a></td>
                        <td>@if($shop->shop_url)<a href="{{ $shop->shop_url }}" target="_blank" class="text-pink-400 underline">صفحة المتجر</a>@else - @endif</td>
                        <td>
                            <span class="fi-badge {{ $shop->category == 'ذهبية' ? 'fi-badge-color-warning' : ($shop->category == 'فضية' ? 'fi-badge-color-gray' : 'fi-badge-color-primary') }}">
                                {{ $shop->category }}
                            </span>
                        </td>
                        <td>
                            <!-- زر تعديل وحذف (يتطلب تنفيذ backend) -->
                            <form method="POST" action="{{ route('accessoraty.shops.destroy', $shop->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>

{{-- ملاحظة: يجب تضمين Swiper.js في resources/js أو public/js وتفعيله للبانر --}}
