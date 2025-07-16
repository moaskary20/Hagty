<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($bazaars as $bazaar)
        <div class="bg-black rounded-lg shadow-lg p-6 flex flex-col gap-2 border border-pink-100">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-lg font-bold text-pink-400">{{ $bazaar->name }}</h3>
                <span class="text-xs bg-pink-100 text-pink-700 px-2 py-1 rounded">{{ $bazaar->city }}</span>
            </div>
            <div class="text-gray-200 text-sm mb-1">نوع الفعالية: {{ $bazaar->info }}</div>
            <div class="flex gap-2 text-xs text-gray-400">
                <span>من: {{ $bazaar->start_date }}</span>
                <span>إلى: {{ $bazaar->end_date }}</span>
            </div>
            <div class="text-xs text-purple-300">العروض: {{ $bazaar->promo }}</div>
            <div class="text-xs text-pink-300">الخصومات: {{ $bazaar->discounts }}</div>
            <div class="flex gap-2 mt-2">
                @if($bazaar->map_url)
                    <a href="{{ $bazaar->map_url }}" target="_blank" class="text-blue-300 underline">الخريطة</a>
                @endif
                <a href="#" class="text-pink-300 underline">تفاصيل</a>
                <a href="#" class="text-purple-300 underline">حجز للمشاركين</a>
            </div>
        </div>
    @endforeach
</div>
