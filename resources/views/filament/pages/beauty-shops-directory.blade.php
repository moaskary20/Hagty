{{-- صفحة دليل المتاجر المتخصصة في قسم جمالي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">دليل المتاجر المتخصصة</h3>
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
        <!-- نموذج إضافة متجر جديد -->
        <div id="addShopForm" style="display:none;">
            <form method="POST" action="#" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="text" name="brand_name" placeholder="اسم العلامة التجارية" class="fi-input" required>
                <input type="url" name="location" placeholder="رابط الموقع (خرائط جوجل)" class="fi-input" required>
                <input type="url" name="shop_url" placeholder="رابط المتجر (اختياري)" class="fi-input">
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="document.getElementById('addShopForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- نموذج إضافة بانر -->
        <div id="addBannerForm" style="display:none;">
            <form method="POST" action="#" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
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
            <form method="POST" action="#" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="url" name="video_url" placeholder="رابط الفيديو (YouTube أو mp4)" class="fi-input" required>
                <input type="number" name="skip_after_seconds" placeholder="مدة تخطي الإعلان بالثواني (مثلاً 6)" class="fi-input" min="1" max="60" required>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">حفظ الفيديو</button>
                    <button type="button" onclick="document.getElementById('addVideoForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- جدول المتاجر -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة المتاجر</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>اسم العلامة التجارية</th>
                        <th>الموقع (خرائط جوجل)</th>
                        <th>رابط المتجر</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>متجر جمالي 1</td>
                        <td><a href="#" target="_blank" class="text-pink-400 underline">رابط الموقع</a></td>
                        <td><a href="#" target="_blank" class="text-pink-400 underline">صفحة المتجر</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>
