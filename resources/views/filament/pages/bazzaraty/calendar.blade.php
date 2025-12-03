<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">تقويم البازارات الشهري</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">يعرض جميع البازارات القادمة مع إمكانية التصفية والتنقل بين الأشهر</p>

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

        @livewire('bazaar-calendar', key('bazaar-calendar-'.now()->timestamp))
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Bazaar Calendar Page Loaded');
            console.log('Livewire available:', typeof Livewire !== 'undefined');
            console.log('Alpine available:', typeof Alpine !== 'undefined');
        });
    </script>
</x-filament::page>
