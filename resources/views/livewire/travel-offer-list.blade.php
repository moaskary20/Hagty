<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <input type="text" wire:model="search" placeholder="ابحث عن عرض أو باقة" class="form-control" style="max-width:220px;">
        <input type="text" wire:model="destination" placeholder="الوجهة" class="form-control" style="max-width:180px;">
        <input type="date" wire:model="date" class="form-control" style="max-width:160px;">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($offers as $offer)
            <div class="rounded-lg shadow-lg p-6 border-l-4 border-pink-500 relative" style="background: linear-gradient(135deg, #2d0a2d 0%, #3a0c2f 100%); color: #fff; min-height: 260px;">
                @if($offer->image)
                    <img src="{{ $offer->image }}" alt="صورة العرض" style="width:100%; max-height:120px; object-fit:cover; border-radius:8px; margin-bottom:1rem;">
                @endif
                @if($offer->video)
                    <video src="{{ $offer->video }}" controls style="width:100%; max-height:120px; border-radius:8px; margin-bottom:1rem;"></video>
                @endif
                <h3 class="text-xl font-bold" style="color:#ffd700;">{{ $offer->title }}</h3>
                <p class="text-pink-200 font-medium">{{ $offer->destination }} - {{ $offer->date }}</p>
                <p class="mb-2">{{ $offer->description }}</p>
                <p class="font-bold">السعر: {{ $offer->price ? number_format($offer->price,2) : 'حسب الطلب' }} ريال</p>
                <div class="absolute bottom-4 left-4 flex gap-2">
                    <button onclick="document.getElementById('addOfferModal').style.display='block';" wire:click="$dispatch('loadOffer', {{ $offer->id }})" style="background:#ffd700; color:#2d0a2d; font-weight:bold; border:none; padding:6px 16px; border-radius:6px;">تعديل</button>
                    <button wire:click="deleteOffer({{ $offer->id }})" style="background:#e91e63; color:#fff; font-weight:bold; border:none; padding:6px 16px; border-radius:6px;">حذف</button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">لا توجد عروض مطابقة للبحث.</div>
        @endforelse
    </div>
</div>
