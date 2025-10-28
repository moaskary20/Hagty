<div>
    <div style="margin-bottom:1rem;">
        <input type="text" wire:model="search" placeholder="ابحث عن مكتب أو عنوان أو رقم" class="fi-input" style="max-width:300px;">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($offices as $office)
            <div class="fi-card rounded-lg shadow-lg p-6 border-l-4 border-pink-500 relative">
                <img src="/images/tourism-office.png" alt="مكتب سياحة" style="width:60px; height:60px; position:absolute; top:16px; left:16px; border-radius:12px; box-shadow:0 2px 8px #e91e6333;">
                <div class="flex flex-col gap-2 pr-20">
                    <h3 class="text-xl font-bold text-gray-900">{{ $office->brand }}</h3>
                    <p class="text-gray-700 font-medium">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($office->address) }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ $office->address }}
                        </a>
                    </p>
                    <p>
                        <a href="tel:{{ $office->phone }}" class="text-gray-900">{{ $office->phone }}</a>
                    </p>
                    <p>
                        @if($office->page_url)
                            <a href="{{ $office->page_url }}" target="_blank" class="text-pink-600 hover:underline">صفحة المكتب</a>
                        @else
                            -
                        @endif
                    </p>
                </div>
                <div class="absolute bottom-4 left-4 flex gap-2">
                    <button onclick="document.getElementById('addOfficeModal').style.display='block';" wire:click="$dispatch('loadOffice', {{ $office->id }})" class="fi-btn bg-yellow-600 text-white font-bold px-4 py-2 rounded-lg hover:bg-yellow-700">تعديل</button>
                    <button wire:click="deleteOffice({{ $office->id }})" class="fi-btn bg-red-600 text-white font-bold px-4 py-2 rounded-lg hover:bg-red-700">حذف</button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">لا توجد مكاتب مطابقة للبحث.</div>
        @endforelse
    </div>
</div>
