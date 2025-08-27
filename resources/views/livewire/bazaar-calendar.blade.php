<div class="bg-black rounded-lg shadow-lg p-6 mt-4">
    <div class="mb-6 flex flex-col md:flex-row gap-4 items-center">
        <div>
            <label class="block mb-1 text-sm text-gray-200">المدينة:</label>
            <select wire:model="city" class="rounded-lg border-gray-700 bg-black text-white">
                <option value="">الكل</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block mb-1 text-sm text-gray-200">نوع الفعالية:</label>
            <select wire:model="type" class="rounded-lg border-gray-700 bg-black text-white">
                <option value="">الكل</option>
                @foreach($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-2 items-center">
            <button wire:click="previousMonth" class="bg-pink-400 hover:bg-pink-600 text-white px-3 py-2 rounded">الشهر السابق</button>
            <span class="font-bold text-lg text-white">{{ $currentMonthName }} {{ $currentYear }}</span>
            <button wire:click="nextMonth" class="bg-pink-400 hover:bg-pink-600 text-white px-3 py-2 rounded">الشهر التالي</button>
        </div>
    </div>
    <div class="flex justify-end mb-4 gap-2">
        <button wire:click="openAddBazaarModal" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded shadow transition">إضافة بازار</button>
        <button wire:click="openEditBazaarModal" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded shadow transition">تعديل بازار</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($bazaars as $bazaar)
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
                    <a href="#" wire:click.prevent="openBazaarInfoModal({{ $bazaar->id }})" class="text-pink-300 underline">تفاصيل</a>
                    <a href="#" wire:click.prevent="openBookingModal({{ $bazaar->id }})" class="text-purple-300 underline">حجز للمشاركين</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-400">لا توجد بازارات في هذا الشهر</div>
        @endforelse
    </div>
</div>

{{-- مودال إضافة بازار --}}
@if($showAddBazaarModal)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="bg-black rounded-lg shadow-xl max-w-lg w-full p-6 border border-pink-400">
            <h2 class="text-xl font-bold text-pink-400 mb-4">إضافة بازار جديد</h2>
            <livewire:bazaar-form key="add-bazaar-form" />
            <button wire:click="$set('showAddBazaarModal', false)" class="mt-4 bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded">إغلاق</button>
        </div>
    </div>
@endif
{{-- مودال تعديل بازار --}}
@if($showEditBazaarModal)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="bg-black rounded-lg shadow-xl max-w-lg w-full p-6 border border-purple-400">
            <h2 class="text-xl font-bold text-purple-400 mb-4">تعديل بيانات بازار</h2>
            <div class="text-gray-200 mb-4">هنا يمكنك تعديل بيانات البازار الحالي.</div>
            <button wire:click="$set('showEditBazaarModal', false)" class="mt-4 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded">إغلاق</button>
        </div>
    </div>
@endif

{{-- مودال تفاصيل البازار --}}
@if($showBazaarInfoModal && $bazaarDetails)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="bg-black rounded-lg shadow-xl max-w-lg w-full p-6 border border-pink-400">
            <h2 class="text-xl font-bold text-pink-400 mb-4">تفاصيل البازار</h2>
            <div class="text-gray-200 mb-2"><b>الاسم:</b> {{ $bazaarDetails->name }}</div>
            <div class="text-gray-200 mb-2"><b>المدينة:</b> {{ $bazaarDetails->city }}</div>
            <div class="text-gray-200 mb-2"><b>نوع الفعالية:</b> {{ $bazaarDetails->info }}</div>
            <div class="text-gray-200 mb-2"><b>من:</b> {{ $bazaarDetails->start_date }} <b>إلى:</b> {{ $bazaarDetails->end_date }}</div>
            <div class="text-gray-200 mb-2"><b>العروض:</b> {{ $bazaarDetails->promo }}</div>
            <div class="text-gray-200 mb-2"><b>الخصومات:</b> {{ $bazaarDetails->discounts }}</div>
            <button wire:click="closeBazaarInfoModal" class="mt-4 bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded">إغلاق</button>
        </div>
    </div>
@endif

{{-- مودال حجز للمشاركين --}}
@if($showBookingModal && $bazaarDetails)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="bg-black rounded-lg shadow-xl max-w-lg w-full p-6 border border-purple-400">
            <h2 class="text-xl font-bold text-purple-400 mb-4">حجز للمشاركين</h2>
            <div class="text-gray-200 mb-4">للحجز في بازار: <b>{{ $bazaarDetails->name }}</b></div>
            <div class="text-gray-200 mb-2">يرجى التواصل مع إدارة البازار أو استخدام النموذج لاحقًا.</div>
            <button wire:click="closeBookingModal" class="mt-4 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded">إغلاق</button>
        </div>
    </div>
@endif
