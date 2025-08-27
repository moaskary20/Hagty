<div>
    <div class="flex flex-col md:flex-row md:items-center gap-4 mb-6">
        <input type="text" wire:model.debounce.500ms="search" placeholder="بحث باسم الطبق..." class="rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400 w-full md:w-1/3">
        <select wire:model="status" class="rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400 w-full md:w-1/4">
            <option value="">كل الحالات</option>
            <option value="active">نشط</option>
            <option value="inactive">غير نشط</option>
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($plates as $plate)
            <div class="bg-white rounded-lg shadow p-4 relative flex flex-col">
                @if($plate->main_image)
                    <img src="{{ asset('storage/'.$plate->main_image) }}" class="w-full h-48 object-cover rounded mb-2">
                @endif
                <h3 class="font-bold text-lg text-pink-600 mb-1">{{ $plate->title }}</h3>
                <p class="text-gray-600 mb-2">{{ $plate->description }}</p>
                <div class="mb-2">
                    <span class="font-bold">خطوات التحضير:</span>
                    <ol class="list-decimal list-inside text-gray-700">
                        @foreach($plate->steps as $step)
                            <li>{{ $step }}</li>
                        @endforeach
                    </ol>
                </div>
                @if($plate->gallery)
                    <div class="flex gap-2 mb-2">
                        @foreach($plate->gallery as $img)
                            <img src="{{ asset('storage/'.$img) }}" class="w-16 h-16 object-cover rounded">
                        @endforeach
                    </div>
                @endif
                @if($plate->video_url)
                    <div class="aspect-w-16 aspect-h-9 mb-2">
                        <iframe src="{{ $plate->video_url }}" frameborder="0" allowfullscreen class="w-full h-40 rounded"></iframe>
                    </div>
                @endif
                <span class="text-xs px-2 py-1 rounded {{ $plate->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-500' }} w-max">{{ $plate->status == 'active' ? 'نشط' : 'غير نشط' }}</span>
                <div class="flex gap-2 mt-3">
                    <button wire:click="$emit('editPlateOfTheDay', {{ $plate->id }})" class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded">تعديل</button>
                    <button wire:click="delete({{ $plate->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">حذف</button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-400 py-8">لا توجد أطباق اليوم حالياً</div>
        @endforelse
    </div>
</div>
