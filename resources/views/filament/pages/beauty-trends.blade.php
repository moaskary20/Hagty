{{-- صفحة صيحات وألوان التجميل في قسم جمالي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">صيحات وألوان التجميل</h3>
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="document.getElementById('addTipForm').style.display='block'">
                + إضافة نصيحة جديدة
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" onclick="document.getElementById('addVideoForm').style.display='block'">
                + إضافة فيديو تصفيف شعر
            </button>
        </div>
        <!-- نموذج إضافة نصيحة -->
        <div id="addTipForm" style="display:none;">
            <form method="POST" action="#" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <textarea name="tip" placeholder="اكتب نصيحة التجميل هنا" class="fi-input" required></textarea>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة النصيحة</button>
                    <button type="button" onclick="document.getElementById('addTipForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- نموذج إضافة فيديو تصفيف شعر -->
        <div id="addVideoForm" style="display:none;">
            <form method="POST" action="#" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="text" name="video_title" placeholder="عنوان الفيديو" class="fi-input" required>
                <textarea name="video_text" placeholder="نص المدونة أو وصف الفيديو" class="fi-input" required></textarea>
                <input type="url" name="video_url" placeholder="رابط الفيديو (YouTube أو mp4)" class="fi-input" required>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الفيديو</button>
                    <button type="button" onclick="document.getElementById('addVideoForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- جدول النصائح -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">نصائح التجميل</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>النصيحة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>استخدمي الزيوت الطبيعية لترطيب الشعر.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- جدول فيديوهات تصفيف الشعر -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">مدونات تصفيف الشعر (فيديوهات)</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>عنوان الفيديو</th>
                        <th>رابط الفيديو</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>تسريحات شعر عصرية</td>
                        <td><a href="#" target="_blank" class="text-pink-400 underline">رابط الفيديو</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>
