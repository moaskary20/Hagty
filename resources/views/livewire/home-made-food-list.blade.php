<div>
    <div class="flex flex-col md:flex-row md:items-center gap-4 mb-6">
        <input type="text" wire:model.debounce.500ms="search" placeholder="بحث باسم المطبخ أو الطاهية..." class="rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400 w-full md:w-1/3">
        <select wire:model="status" class="rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400 w-full md:w-1/4">
            <option value="">كل الحالات</option>
            <option value="active">نشط</option>
            <option value="inactive">غير نشط</option>
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($foods as $food)
            <div class="bg-white rounded-lg shadow p-4 relative flex flex-col">
                @if($food->image)
                    <img src="{{ asset('storage/'.$food->image) }}" class="w-full h-40 object-cover rounded mb-2">
                @endif
                <h3 class="font-bold text-lg text-pink-600 mb-1">{{ $food->name }}</h3>
                <p class="text-gray-600 mb-1">{{ $food->specialty }}</p>
                <p class="text-gray-500 mb-2">{{ $food->description }}</p>
                <div class="mb-2">
                    <span class="font-bold">الموقع:</span> {{ $food->location }}
                </div>
                @if($food->map_url)
                    <div class="mb-2">
                        <iframe src="{{ $food->map_url }}" width="100%" height="120" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                @endif
                <div class="mb-2">
                    <span class="font-bold">رقم الهاتف:</span> <a href="tel:{{ $food->phone }}" class="text-purple-600">{{ $food->phone }}</a>
                </div>
                <span class="text-xs px-2 py-1 rounded {{ $food->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-500' }} w-max">{{ $food->status == 'active' ? 'نشط' : 'غير نشط' }}</span>
                <div class="flex gap-2 mt-3">
                    <button wire:click="$emit('editHomeMadeFood', {{ $food->id }})" class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded">تعديل</button>
                    <button wire:click="delete({{ $food->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">حذف</button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-400 py-8">لا توجد مطابخ منزلية حالياً</div>
        @endforelse
    </div>
</div>
