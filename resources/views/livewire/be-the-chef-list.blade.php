<div>
    <div class="flex flex-col md:flex-row md:items-center gap-4 mb-6">
        <input type="text" wire:model.debounce.500ms="search" placeholder="بحث بعنوان الدورة أو الفيديو..." class="rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400 w-full md:w-1/3">
        <select wire:model="status" class="rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400 w-full md:w-1/4">
            <option value="">كل الحالات</option>
            <option value="active">نشط</option>
            <option value="inactive">غير نشط</option>
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($chefs as $chef)
            <div class="bg-white rounded-lg shadow p-4 relative flex flex-col">
                @if($chef->image)
                    <img src="{{ asset('storage/'.$chef->image) }}" class="w-full h-40 object-cover rounded mb-2">
                @endif
                <h3 class="font-bold text-lg text-pink-600 mb-1">{{ $chef->title }}</h3>
                <span class="text-xs px-2 py-1 rounded {{ $chef->type == 'course' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }} w-max mb-1">{{ $chef->type == 'course' ? 'دورة طبخ' : 'فيديو تعليمي' }}</span>
                <p class="text-gray-600 mb-2">{{ $chef->description }}</p>
                @if($chef->video_url)
                    <div class="aspect-w-16 aspect-h-9 mb-2">
                        <iframe src="{{ $chef->video_url }}" frameborder="0" allowfullscreen class="w-full h-40 rounded"></iframe>
                    </div>
                @endif
                <div class="mb-2">
                    <span class="font-bold">نوع الدورة:</span> {{ $chef->is_online ? 'أونلاين' : 'حضورية' }}
                </div>
                @if($chef->tips)
                    <div class="mb-2">
                        <span class="font-bold">نصائح الشيف:</span>
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach($chef->tips as $tip)
                                <li>{{ $tip }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <span class="text-xs px-2 py-1 rounded {{ $chef->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-500' }} w-max">{{ $chef->status == 'active' ? 'نشط' : 'غير نشط' }}</span>
                <div class="flex gap-2 mt-3">
                    <button wire:click="$emit('editBeTheChef', {{ $chef->id }})" class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded">تعديل</button>
                    <button wire:click="delete({{ $chef->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">حذف</button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-400 py-8">لا توجد دورات أو فيديوهات حالياً</div>
        @endforelse
    </div>
</div>
