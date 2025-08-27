<div>
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:gap-4">
        <input type="text" wire:model.debounce.400ms="search" placeholder="ابحث باسم الفعالية أو الوجهة..." class="w-full md:w-1/3 rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow mb-2 md:mb-0" />
        <select wire:model="statusFilter" class="w-full md:w-1/6 rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow mb-2 md:mb-0">
            <option value="">كل الحالات</option>
            <option value="محجوزة">محجوزة</option>
            <option value="مخطط لها">مخطط لها</option>
            <option value="مكتملة">مكتملة</option>
        </select>
        <input type="date" wire:model="dateFilter" class="w-full md:w-1/6 rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow" />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($events ?? [] as $event)
            <div class="bg-gradient-to-br from-pink-100 to-purple-100 rounded-xl shadow p-6 flex flex-col gap-2 border border-pink-200">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-lg font-bold text-pink-700">{{ $event['name'] }}</span>
                    <span class="text-xs bg-pink-200 text-pink-800 rounded px-2 py-1">{{ $event['status'] }}</span>
                </div>
                <div class="text-pink-900">{{ $event['destination'] }}</div>
                <div class="text-xs text-pink-500">{{ $event['date'] }}</div>
                <div class="flex gap-2 mt-4">
                    <button class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded" onclick="document.getElementById('addEventModal').style.display='block'; window.livewire.emit('editEvent', {{ $event->id }})">تعديل</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded" wire:click="deleteEvent({{ $event->id }})">حذف</button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-pink-400 py-8">لا توجد فعاليات حالياً</div>
        @endforelse
    </div>
</div>
