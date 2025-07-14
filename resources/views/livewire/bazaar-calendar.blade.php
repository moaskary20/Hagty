<div class="bg-white rounded-lg shadow-lg p-6 mt-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($bazaars as $bazaar)
            <div class="border border-pink-100 rounded-lg p-4 flex flex-col gap-2">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-bold text-pink-700">{{ $bazaar->name }}</h3>
                    <span class="text-xs bg-pink-100 text-pink-700 px-2 py-1 rounded">{{ $bazaar->city }}</span>
                </div>
                <div class="text-gray-700 text-sm mb-1">{{ $bazaar->info }}</div>
                <div class="flex gap-2 text-xs text-gray-500">
                    <span>من: {{ $bazaar->start_date }}</span>
                    <span>إلى: {{ $bazaar->end_date }}</span>
                </div>
                <div class="text-xs text-purple-700">العروض: {{ $bazaar->promo }}</div>
                <div class="text-xs text-pink-700">الخصومات: {{ $bazaar->discounts }}</div>
                <div class="mt-2 flex gap-2">
                    @if($bazaar->map_url)
                        <a href="{{ $bazaar->map_url }}" target="_blank" class="text-blue-600 underline">الخريطة</a>
                    @endif
                    <a href="#" class="text-pink-600 underline">تفاصيل</a>
                    <a href="#" class="text-purple-600 underline">حجز</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-400">لا توجد بازارات في هذا الشهر</div>
        @endforelse
    </div>
</div>
