<div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-200">
    <div class="container mx-auto py-10">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">مرحباً بالطفل</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($this->babies as $baby)
                <div class="bg-blue-50 rounded-xl shadow p-6 flex flex-col gap-2 relative border border-blue-200">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <button wire:click="openBabyModal({{ $baby->id }})" class="bg-blue-500 text-white px-3 py-1 rounded text-xs">تعديل</button>
                        <button wire:click="deleteBaby({{ $baby->id }})" class="bg-red-500 text-white px-3 py-1 rounded text-xs" onclick="return confirm('هل أنت متأكد من حذف الطفل؟')">حذف</button>
                    </div>
                    <h3 class="text-lg font-bold text-blue-600">{{ $baby->name }}</h3>
                    <div>تاريخ الميلاد: <span class="font-semibold">{{ $baby->birth_date }}</span></div>
                    <div>الجنس: <span class="font-semibold">{{ $baby->gender }}</span></div>
                    <div>اسم الأم: <span class="font-semibold">{{ $baby->mother_name }}</span></div>
                    <div>اسم الأب: <span class="font-semibold">{{ $baby->father_name }}</span></div>
                    <div>معلومات صحية: <span class="font-semibold">{{ $baby->health_info }}</span></div>
                </div>
                @endforeach
            </div>
            <div class="mt-8 flex justify-center">
                <button wire:click="openBabyModal()" class="bg-blue-500 text-white px-6 py-2 rounded-xl shadow">إضافة طفل جديد</button>
            </div>
        </div>
        {{-- ...existing code... --}}
    </div>
</div>
