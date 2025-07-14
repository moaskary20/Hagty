<div>
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:gap-4">
        <input type="text" wire:model.debounce.400ms="search" placeholder="ابحث باسم الفندق أو الموقع..." class="w-full md:w-1/3 rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow mb-2 md:mb-0" />
        <select wire:model="brandFilter" class="w-full md:w-1/6 rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow mb-2 md:mb-0">
            <option value="">كل العلامات التجارية</option>
            @foreach($brands ?? [] as $brand)
                <option value="{{ $brand }}">{{ $brand }}</option>
            @endforeach
        </select>
        <select wire:model="statusFilter" class="w-full md:w-1/6 rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow mb-2 md:mb-0">
            <option value="">كل الحالات</option>
            <option value="متاح">متاح</option>
            <option value="مغلق">مغلق</option>
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($hotels ?? [] as $hotel)
            <div class="bg-gradient-to-br from-pink-100 to-purple-100 rounded-xl shadow p-6 flex flex-col gap-2 border border-pink-200">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-lg font-bold text-pink-700">{{ $hotel->name }}</span>
                    <span class="text-xs bg-pink-200 text-pink-800 rounded px-2 py-1">{{ $hotel->status }}</span>
                </div>
                <div class="text-pink-900">{{ $hotel->brand }} - {{ $hotel->location }}</div>
                <div class="text-xs text-pink-500">{{ $hotel->offers }}</div>
                <div class="flex gap-2 mt-4">
                    <button class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded" onclick="document.getElementById('addHotelModal').style.display='block'; window.livewire.emit('editHotel', {{ $hotel->id }})">تعديل</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded" wire:click="$emit('deleteHotel', {{ $hotel->id }})">حذف</button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-pink-400 py-8">لا توجد فنادق حالياً</div>
        @endforelse
    </div>
</div>
