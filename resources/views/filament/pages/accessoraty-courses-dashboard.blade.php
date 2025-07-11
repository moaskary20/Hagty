{{-- لوحة تحكم الكورسات التعليمية --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">لوحة تحكم الكورسات التعليمية</h3>
        <div class="grid grid-cols-2 gap-6 mb-8">
            <div class="bg-gray-900 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-pink-400">{{ $courses_count }}</div>
                <div class="text-lg mt-2">عدد الكورسات</div>
            </div>
            <div class="bg-gray-900 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-pink-400">{{ $students_count }}</div>
                <div class="text-lg mt-2">عدد الطلاب المسجلين</div>
            </div>
        </div>
        <h4 class="text-base font-bold mb-2">قائمة الكورسات</h4>
        <table class="fi-ta-table w-full text-center">
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
                    <td>{{ $course->students_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>
