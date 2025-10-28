<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">تقويم البازارات الشهري</h3>
        <p class="text-sm text-gray-600 mb-4">يعرض جميع البازارات القادمة مع إمكانية التصفية والتنقل بين الأشهر</p>

        @if (session()->has('message'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <livewire:bazaar-calendar wire:key="bazaar-calendar" />
    </div>
</x-filament::page>
