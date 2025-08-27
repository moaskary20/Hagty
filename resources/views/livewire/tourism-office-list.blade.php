<div>
    <div style="margin-bottom:1rem;">
        <input type="text" wire:model="search" placeholder="ابحث عن مكتب أو عنوان أو رقم" class="form-control" style="max-width:300px;">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($offices as $office)
            <div class="rounded-lg shadow-lg p-6 border-l-4 border-pink-500 relative" style="background: linear-gradient(135deg, #2d0a2d 0%, #3a0c2f 100%); color: #fff; min-height: 220px;">
                <img src="/images/tourism-office.png" alt="مكتب سياحة" style="width:60px; height:60px; position:absolute; top:16px; left:16px; border-radius:12px; box-shadow:0 2px 8px #e91e6333;">
                <div class="flex flex-col gap-2 pr-20">
                    <h3 class="text-xl font-bold" style="color:#fff;">{{ $office->brand }}</h3>
                    <p class="text-pink-200 font-medium">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($office->address) }}" target="_blank" style="color:#fff; text-decoration:underline;">
                            {{ $office->address }}
                        </a>
                    </p>
                    <p>
                        <a href="tel:{{ $office->phone }}" style="color:#fff;">{{ $office->phone }}</a>
                    </p>
                    <p>
                        @if($office->page_url)
                            <a href="{{ $office->page_url }}" target="_blank" style="color:#ffd700; text-decoration:underline;">صفحة المكتب</a>
                        @else
                            -
                        @endif
                    </p>
                </div>
                <div class="absolute bottom-4 left-4 flex gap-2">
                    <button onclick="document.getElementById('addOfficeModal').style.display='block';" wire:click="$dispatch('loadOffice', {{ $office->id }})" style="background:#ffd700; color:#2d0a2d; font-weight:bold; border:none; padding:6px 16px; border-radius:6px;">تعديل</button>
                    <button wire:click="deleteOffice({{ $office->id }})" style="background:#e91e63; color:#fff; font-weight:bold; border:none; padding:6px 16px; border-radius:6px;">حذف</button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">لا توجد مكاتب مطابقة للبحث.</div>
        @endforelse
    </div>
</div>
