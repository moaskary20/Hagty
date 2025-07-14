<div class="min-h-screen bg-gradient-to-br from-pink-50 to-purple-50 p-6" dir="rtl">
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">تقويم البازارات الشهري</h1>
        <p class="mt-2 text-pink-100">يعرض جميع البازارات القادمة مع إمكانية التصفية والتنقل بين الأشهر</p>
    </div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="mb-6 flex flex-col md:flex-row gap-4 items-center">
        <div>
            <label class="block mb-1 text-sm text-gray-700">المدينة:</label>
            <select wire:model="city" class="rounded-lg border-gray-300">
                <option value="">الكل</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block mb-1 text-sm text-gray-700">نوع الفعالية:</label>
            <select wire:model="type" class="rounded-lg border-gray-300">
                <option value="">الكل</option>
                @foreach($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-2 items-center">
            <button wire:click="previousMonth" class="bg-pink-400 hover:bg-pink-600 text-white px-3 py-2 rounded">الشهر السابق</button>
            <span class="font-bold text-lg">{{ $currentMonthName }} {{ $currentYear }}</span>
            <button wire:click="nextMonth" class="bg-pink-400 hover:bg-pink-600 text-white px-3 py-2 rounded">الشهر التالي</button>
        </div>
    </div>
    @livewire('bazaar-calendar')
</div>
