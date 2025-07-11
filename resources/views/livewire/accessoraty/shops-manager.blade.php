<div>
    <div style="background: #222; color: #fff; padding: 1rem; border-radius: 8px; margin-bottom: 1rem; text-align: center; font-size: 1.2rem;">
        ✅ مكون ShopsManager تم تحميله بنجاح (رسالة اختبارية)
    </div>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-2">إدارة متاجر الإكسسوارات</h3>
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" wire:click="$set('showForm', true); $set('editId', null); $set('brand_name', ''); $set('location', ''); $set('shop_url', ''); $set('category', '');">
                + إضافة متجر جديد
            </button>
            <button type="button" class="fi-btn bg-pink-600 text-lg px-6 py-2" wire:click="$set('showBannerForm', true)">
                + إضافة إعلان بانر
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" wire:click="$set('showVideoForm', true)">
                + إضافة إعلان فيديو
            </button>
        </div>
        <!-- فلتر الفئة -->
        <div class="mb-4 flex flex-row-reverse gap-2 items-center">
            <label for="categoryFilter" class="font-bold">فلتر حسب الفئة:</label>
            <select id="categoryFilter" wire:model="category" class="fi-input w-40">
                <option value="">كل الفئات</option>
                <option value="ذهبية">ذهبية</option>
                <option value="فضية">فضية</option>
                <option value="ماسية">ماسية</option>
            </select>
        </div>
        <!-- نموذج إضافة/تعديل متجر -->
        @if($showForm)
        <form wire:submit.prevent="save" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
            <input type="text" wire:model.defer="brand_name" placeholder="اسم العلامة التجارية" class="fi-input" required>
            <input type="url" wire:model.defer="location" placeholder="رابط الموقع (خرائط جوجل)" class="fi-input" required>
            <input type="url" wire:model.defer="shop_url" placeholder="رابط المتجر (اختياري)" class="fi-input">
            <select wire:model.defer="category" class="fi-input" required>
                <option value="">اختر الفئة</option>
                <option value="ذهبية">ذهبية</option>
                <option value="فضية">فضية</option>
                <option value="ماسية">ماسية</option>
            </select>
            <div class="flex gap-2 mt-2">
                <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">{{ $editId ? 'تعديل' : 'إضافة' }}</button>
                <button type="button" wire:click="$set('showForm', false)" class="fi-btn bg-gray-500 w-full">إلغاء</button>
            </div>
        </form>
        @endif
        <!-- نموذج إضافة بانر -->
        @if($showBannerForm)
        <form wire:submit.prevent="saveBanner" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg" enctype="multipart/form-data">
            <label>صورة البانر</label>
            <input type="file" wire:model="banner_image" accept="image/*" class="fi-input" required>
            <input type="url" wire:model.defer="banner_link" placeholder="رابط عند الضغط (اختياري)" class="fi-input">
            <div class="flex gap-2 mt-2">
                <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">حفظ البانر</button>
                <button type="button" wire:click="$set('showBannerForm', false)" class="fi-btn bg-gray-500 w-full">إلغاء</button>
            </div>
        </form>
        @endif
        <!-- نموذج إضافة فيديو -->
        @if($showVideoForm)
        <form wire:submit.prevent="saveVideo" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
            <input type="url" wire:model.defer="video_url" placeholder="رابط الفيديو (YouTube أو mp4)" class="fi-input" required>
            <input type="number" wire:model.defer="skip_after_seconds" placeholder="مدة تخطي الإعلان بالثواني (مثلاً 6)" class="fi-input" min="1" max="60" required>
            <div class="flex gap-2 mt-2">
                <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">حفظ الفيديو</button>
                <button type="button" wire:click="$set('showVideoForm', false)" class="fi-btn bg-gray-500 w-full">إلغاء</button>
            </div>
        </form>
        @endif
        <!-- عرض البانرات الحالية -->
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">إعلانات البانر الحالية</h4>
            <div class="flex flex-wrap gap-4">
                @foreach(\App\Models\AccessoratyBannerAd::all() as $banner)
                    <div class="bg-gray-800 rounded-lg p-2 flex flex-col items-center" style="width: 180px;">
                        <img src="{{ asset('storage/' . $banner->image) }}" alt="بانر" style="max-width: 150px; max-height: 80px; border-radius: 6px; margin-bottom: 8px;">
                        @if($banner->link)
                            <a href="{{ $banner->link }}" target="_blank" class="text-pink-400 text-xs mb-2">رابط الإعلان</a>
                        @endif
                        <button wire:click="$emitUp('deleteBanner', {{ $banner->id }})" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- عرض فيديوهات الرعاة الحالية -->
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">إعلانات الفيديو الحالية</h4>
            <div class="flex flex-wrap gap-4">
                @foreach(\App\Models\AccessoratySponsorVideo::all() as $video)
                    <div class="bg-gray-800 rounded-lg p-2 flex flex-col items-center" style="width: 220px;">
                        <video src="{{ $video->video_url }}" controls style="max-width: 200px; max-height: 120px; border-radius: 6px; margin-bottom: 8px;"></video>
                        <span class="text-xs text-gray-300 mb-1">مدة تخطي الإعلان: {{ $video->skip_after_seconds }} ثانية</span>
                        <button wire:click="$emitUp('deleteVideo', {{ $video->id }})" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
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
                    <tr>
                        <td>{{ $shop->brand_name }}</td>
                        <td><a href="{{ $shop->location }}" target="_blank" class="text-pink-400 underline">رابط الموقع</a></td>
                        <td>@if($shop->shop_url)<a href="{{ $shop->shop_url }}" target="_blank" class="text-pink-400 underline">صفحة المتجر</a>@else - @endif</td>
                        <td>{{ $shop->category }}</td>
                        <td>
                            <button class="fi-btn bg-yellow-600 text-xs py-1 px-2" wire:click="edit({{ $shop->id }})">تعديل</button>
                            <button class="fi-btn bg-red-600 text-xs py-1 px-2" wire:click="delete({{ $shop->id }})">حذف</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
