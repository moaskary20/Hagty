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
    <livewire:bazaar-calendar wire:key="bazaar-calendar" />
</div>
