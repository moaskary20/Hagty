<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($bazaars as $bazaar)
        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col gap-2 border border-pink-100">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-xl font-bold text-pink-700">{{ $bazaar->name }}</h3>
                <span class="text-xs bg-pink-100 text-pink-700 px-2 py-1 rounded">{{ $bazaar->city }}</span>
            </div>
            <div class="text-gray-700 text-sm mb-1">{{ $bazaar->info }}</div>
            <div class="flex gap-2 text-xs text-gray-500">
                <span>من: {{ $bazaar->start_date }}</span>
                <span>إلى: {{ $bazaar->end_date }}</span>
            </div>
            <div class="text-xs text-purple-700">العروض: {{ $bazaar->promo }}</div>
            <div class="text-xs text-pink-700">الخصومات: {{ $bazaar->discounts }}</div>
            <div class="mt-2">
                @if($bazaar->map_url)
                    <a href="{{ $bazaar->map_url }}" target="_blank" class="text-blue-600 underline">عرض الموقع على الخريطة</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
