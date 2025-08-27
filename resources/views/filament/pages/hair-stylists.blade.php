{{-- صفحة مصففو الشعر في قسم جمالي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">مصففو الشعر</h3>
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="document.getElementById('addStylistForm').style.display='block'">
                + إضافة مصففة شعر
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" onclick="document.getElementById('addVideoForm').style.display='block'">
                + إضافة إعلان فيديو
            </button>
        </div>
        <!-- نموذج إضافة مصففة شعر -->
        <div id="addStylistForm" style="display:none;">
            <form method="POST" action="#" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="text" name="name" placeholder="اسم مصففة الشعر" class="fi-input" required>
                <input type="file" name="works_images[]" multiple accept="image/*" class="fi-input" required>
                <input type="url" name="location" placeholder="رابط العنوان على خرائط جوجل (اختياري)" class="fi-input">
                <input type="text" name="phone" placeholder="رقم الهاتف" class="fi-input" required>
                <input type="url" name="profile_url" placeholder="رابط الصفحة الشخصية (اختياري)" class="fi-input">
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="document.getElementById('addStylistForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- نموذج إضافة إعلان فيديو -->
        <div id="addVideoForm" style="display:none;">
            <form method="POST" action="#" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="url" name="video_url" placeholder="رابط الفيديو (YouTube أو mp4)" class="fi-input" required>
                <input type="text" name="stylist_name" placeholder="اسم مصففة الشعر" class="fi-input" required>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">حفظ الفيديو</button>
                    <button type="button" onclick="document.getElementById('addVideoForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- جدول مصففو الشعر -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة مصففي الشعر</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>صور الأعمال</th>
                        <th>العنوان (خرائط جوجل)</th>
                        <th>رقم الهاتف</th>
                        <th>رابط الصفحة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>مصففة شعر 1</td>
                        <td>
                            <img src="#" alt="عمل 1" style="width:60px; border-radius:8px; margin:2px;">
                            <img src="#" alt="عمل 2" style="width:60px; border-radius:8px; margin:2px;">
                        </td>
                        <td><a href="#" target="_blank" class="text-pink-400 underline">رابط العنوان</a></td>
                        <td>01000000000</td>
                        <td><a href="#" target="_blank" class="text-pink-400 underline">صفحة الشخصية</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- جدول فيديوهات الإعلانات -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">إعلانات الفيديو لأعمال مصففي الشعر</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>اسم المصففة</th>
                        <th>رابط الفيديو</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>مصففة شعر 1</td>
                        <td><a href="#" target="_blank" class="text-pink-400 underline">رابط الفيديو</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>
