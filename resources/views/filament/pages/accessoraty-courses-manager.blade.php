{{-- إدارة الكورسات والطلاب --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">إدارة الكورسات والطلاب</h3>
        <!-- نموذج إضافة كورس جديد -->
        <div class="mb-8">
            <h4 class="text-base font-bold mb-2">إضافة كورس جديد</h4>
            <form method="POST" action="#" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="text" name="name" placeholder="اسم الكورس" class="fi-input" required>
                <textarea name="description" placeholder="وصف الكورس" class="fi-input" required></textarea>
                <input type="text" name="duration" placeholder="المدة الزمنية" class="fi-input" required>
                <input type="text" name="instructor" placeholder="اسم المحاضر أو المدرب" class="fi-input" required>
                <input type="number" name="max_students" placeholder="عدد الطلاب المسموح" class="fi-input" required>
                <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الكورس</button>
            </form>
        </div>
        <!-- نموذج تسجيل طالب جديد -->
        <div class="mb-8">
            <h4 class="text-base font-bold mb-2">تسجيل طالب جديد</h4>
            <form method="POST" action="#" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                <input type="text" name="name" placeholder="اسم الطالب" class="fi-input" required>
                <input type="email" name="email" placeholder="البريد الإلكتروني" class="fi-input" required>
                <input type="text" name="phone" placeholder="رقم الهاتف" class="fi-input" required>
                <select name="course_id" class="fi-input" required>
                    <option value="">اختر الكورس</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">تسجيل الطالب</button>
            </form>
        </div>
        <!-- جدول الكورسات -->
        <h4 class="text-base font-bold mb-2">قائمة الكورسات</h4>
        <table class="fi-ta-table w-full text-center mb-8">
            <thead>
                <tr>
                    <th>اسم الكورس</th>
                    <th>الوصف</th>
                    <th>المدة</th>
                    <th>المدرب</th>
                    <th>السعة</th>
                    <th>عدد الطلاب</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->instructor }}</td>
                    <td>{{ $course->max_students }}</td>
                    <td>{{ $course->students->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- جدول الطلاب -->
        <h4 class="text-base font-bold mb-2">قائمة الطلاب</h4>
        <table class="fi-ta-table w-full text-center">
            <thead>
                <tr>
                    <th>اسم الطالب</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>الكورس المسجل</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->course ? $student->course->name : '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>
