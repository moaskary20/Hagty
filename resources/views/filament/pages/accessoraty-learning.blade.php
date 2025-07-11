{{-- صفحة يمكنك تحقيق ذلك: نظام تعليمى لإدارة الكورسات والفيديوهات التدريبية --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">نظام تعليمى لإدارة الكورسات التعليمية والفيديوهات التدريبية</h3>
        <!-- قسم الكورسات التعليمية -->
        <div class="mb-8">
            <h4 class="text-base font-bold mb-2">الكورسات التعليمية</h4>
            <p class="mb-4 text-gray-300">يمكنك إضافة وتعديل وحذف الكورسات التعليمية هنا.</p>
            {{-- نموذج إضافة كورس جديد --}}
            <form method="POST" action="#" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="text" name="course_title" placeholder="عنوان الكورس" class="fi-input" required>
                <textarea name="course_description" placeholder="وصف الكورس" class="fi-input" required></textarea>
                <input type="url" name="course_link" placeholder="رابط الكورس أو المنصة" class="fi-input">
                <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الكورس</button>
            </form>
            {{-- جدول الكورسات (عرض تجريبي) --}}
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>الرابط</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>كورس إدارة الإكسسوارات</td>
                        <td>تعلم أساسيات إدارة متجر إكسسوارات احترافي.</td>
                        <td><a href="#" class="text-pink-400 underline">رابط الكورس</a></td>
                        <td><button class="fi-btn bg-yellow-600 text-xs py-1 px-2">تعديل</button> <button class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- قسم الفيديوهات التدريبية -->
        <div>
            <h4 class="text-base font-bold mb-2">الفيديوهات التدريبية</h4>
            <p class="mb-4 text-gray-300">يمكنك إضافة فيديو تدريبي جديد أو إدارة الفيديوهات الحالية.</p>
            {{-- نموذج إضافة فيديو جديد --}}
            <form method="POST" action="#" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="text" name="video_title" placeholder="عنوان الفيديو" class="fi-input" required>
                <input type="url" name="video_url" placeholder="رابط الفيديو (YouTube أو mp4)" class="fi-input" required>
                <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الفيديو</button>
            </form>
            {{-- جدول الفيديوهات (عرض تجريبي) --}}
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>رابط الفيديو</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>فيديو تدريبى: التسويق لمتجر الإكسسوارات</td>
                        <td><a href="#" class="text-pink-400 underline">رابط الفيديو</a></td>
                        <td><button class="fi-btn bg-yellow-600 text-xs py-1 px-2">تعديل</button> <button class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>
