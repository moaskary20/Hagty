<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mt-4" x-data>
    <!-- Debug Info -->
    <div class="mb-2 p-2 bg-yellow-100 dark:bg-yellow-900 rounded text-xs">
        <strong>Debug:</strong> 
        showAddModal: {{ $showAddBazaarModal ? 'true' : 'false' }} | 
        showEditModal: {{ $showEditBazaarModal ? 'true' : 'false' }}
    </div>
    
    <div class="mb-6 flex flex-col md:flex-row gap-4 items-center">
        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-200">المدينة:</label>
            <select wire:model.live="city" class="rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:border-purple-500 focus:ring-purple-500">
                <option value="">الكل</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-200">نوع الفعالية:</label>
            <select wire:model.live="type" class="rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:border-purple-500 focus:ring-purple-500">
                <option value="">الكل</option>
                @foreach($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-2 items-center">
            <button type="button" 
                    wire:click="previousMonth" 
                    onclick="console.log('Previous month clicked')"
                    class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-2 rounded transition-colors duration-200 cursor-pointer">
                ← الشهر السابق
            </button>
            <span class="font-bold text-lg text-gray-900 dark:text-white whitespace-nowrap">{{ $currentMonthName }} {{ $currentYear }}</span>
            <button type="button" 
                    wire:click="nextMonth"
                    onclick="console.log('Next month clicked')"
                    class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-2 rounded transition-colors duration-200 cursor-pointer">
                الشهر التالي →
            </button>
        </div>
    </div>
    <div class="flex justify-end mb-4 gap-2">
        <button type="button" 
                wire:click="openAddBazaarModal"
                wire:loading.attr="disabled"
                onclick="console.log('Add bazaar clicked'); console.log('Calling Livewire method...')"
                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded shadow transition-colors duration-200 cursor-pointer disabled:opacity-50">
            <span wire:loading.remove wire:target="openAddBazaarModal">➕ إضافة بازار</span>
            <span wire:loading wire:target="openAddBazaarModal">⏳ جار التحميل...</span>
        </button>
        <button type="button" 
                wire:click="openEditBazaarModal"
                wire:loading.attr="disabled"
                onclick="console.log('Edit bazaar clicked'); console.log('Calling Livewire method...')"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow transition-colors duration-200 cursor-pointer disabled:opacity-50">
            <span wire:loading.remove wire:target="openEditBazaarModal">✏️ تعديل بازار</span>
            <span wire:loading wire:target="openEditBazaarModal">⏳ جار التحميل...</span>
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($bazaars as $bazaar)
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 flex flex-col gap-2 border border-purple-200 dark:border-purple-500">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-bold text-purple-600 dark:text-purple-400">{{ $bazaar->name }}</h3>
                    <span class="text-xs bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-200 px-2 py-1 rounded">{{ $bazaar->city }}</span>
                </div>
                <div class="text-gray-700 dark:text-gray-200 text-sm mb-1">نوع الفعالية: {{ $bazaar->info }}</div>
                <div class="flex gap-2 text-xs text-gray-600 dark:text-gray-400">
                    <span>من: {{ $bazaar->start_date }}</span>
                    <span>إلى: {{ $bazaar->end_date }}</span>
                </div>
                <div class="text-xs text-indigo-600 dark:text-indigo-300">العروض: {{ $bazaar->promo }}</div>
                <div class="text-xs text-purple-600 dark:text-purple-300">الخصومات: {{ $bazaar->discounts }}</div>
                <div class="flex gap-2 mt-2">
                    @if($bazaar->map_url)
                        <a href="{{ $bazaar->map_url }}" target="_blank" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800">الخريطة</a>
                    @endif
                    <button type="button" wire:click="openBazaarInfoModal({{ $bazaar->id }})" class="text-purple-600 dark:text-purple-400 underline hover:text-purple-800">
                        تفاصيل
                    </button>
                    <button type="button" wire:click="openBookingModal({{ $bazaar->id }})" class="text-indigo-600 dark:text-indigo-400 underline hover:text-indigo-800">
                        حجز للمشاركين
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-600 dark:text-gray-400 py-8">لا توجد بازارات في هذا الشهر</div>
        @endforelse
    </div>

    {{-- مودال إضافة بازار --}}
@if($showAddBazaarModal)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50" wire:key="add-modal">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full p-6 border border-purple-400 max-h-screen overflow-y-auto">
            <h2 class="text-xl font-bold text-purple-600 dark:text-purple-400 mb-4">إضافة بازار جديد</h2>
            
            <form wire:submit.prevent="saveBazaar" class="flex flex-col gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">اسم البازار *</label>
                    <input type="text" 
                           wire:model="bazaarName" 
                           placeholder="اسم البازار" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2" 
                           required>
                    @error('bazaarName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">معلومات البازار</label>
                    <textarea wire:model="info" 
                              placeholder="معلومات البازار" 
                              rows="3"
                              class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2"></textarea>
                </div>
                
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">تاريخ البداية *</label>
                        <input type="date" 
                               wire:model="start_date" 
                               class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2" 
                               required>
                        @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">تاريخ النهاية *</label>
                        <input type="date" 
                               wire:model="end_date" 
                               class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2" 
                               required>
                        @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">المدينة *</label>
                    <input type="text" 
                           wire:model="bazaarCity" 
                           placeholder="المدينة" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2" 
                           required>
                    @error('bazaarCity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">الموقع (اختياري)</label>
                    <input type="text" 
                           wire:model="location" 
                           placeholder="الموقع" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">رابط خرائط Google (اختياري)</label>
                    <input type="url" 
                           wire:model="map_url" 
                           placeholder="https://maps.google.com/..." 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">العروض الترويجية (اختياري)</label>
                    <input type="text" 
                           wire:model="promo" 
                           placeholder="العروض الترويجية" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">الخصومات (اختياري)</label>
                    <input type="text" 
                           wire:model="discounts" 
                           placeholder="الخصومات" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2">
                </div>
                
                <div class="flex gap-2 mt-4">
                    <button type="submit" 
                            class="flex-1 bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200">
                        💾 حفظ البازار
                    </button>
                    <button type="button" 
                            wire:click="$set('showAddBazaarModal', false)" 
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200">
                        ✖️ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>
@endif

{{-- مودال تعديل بازار --}}
@if($showEditBazaarModal)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50" wire:key="edit-modal">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full p-6 border border-indigo-400">
            <h2 class="text-xl font-bold text-indigo-600 dark:text-indigo-400 mb-4">تعديل بيانات بازار</h2>
            <div class="text-gray-700 dark:text-gray-200 mb-4">هنا يمكنك تعديل بيانات البازار الحالي.</div>
            <button type="button" wire:click="$set('showEditBazaarModal', false)" class="mt-4 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition-colors duration-200">
                إغلاق
            </button>
        </div>
    </div>
@endif

{{-- مودال تفاصيل البازار --}}
@if($showBazaarInfoModal && $bazaarDetails)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50" wire:key="info-modal-{{ $bazaarDetails->id }}">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full p-6 border border-purple-400">
            <h2 class="text-xl font-bold text-purple-600 dark:text-purple-400 mb-4">تفاصيل البازار</h2>
            <div class="text-gray-700 dark:text-gray-200 mb-2"><b>الاسم:</b> {{ $bazaarDetails->name }}</div>
            <div class="text-gray-700 dark:text-gray-200 mb-2"><b>المدينة:</b> {{ $bazaarDetails->city }}</div>
            <div class="text-gray-700 dark:text-gray-200 mb-2"><b>نوع الفعالية:</b> {{ $bazaarDetails->info }}</div>
            <div class="text-gray-700 dark:text-gray-200 mb-2"><b>من:</b> {{ $bazaarDetails->start_date }} <b>إلى:</b> {{ $bazaarDetails->end_date }}</div>
            <div class="text-gray-700 dark:text-gray-200 mb-2"><b>العروض:</b> {{ $bazaarDetails->promo }}</div>
            <div class="text-gray-700 dark:text-gray-200 mb-2"><b>الخصومات:</b> {{ $bazaarDetails->discounts }}</div>
            <button type="button" wire:click="closeBazaarInfoModal" class="mt-4 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded transition-colors duration-200">
                إغلاق
            </button>
        </div>
    </div>
@endif

{{-- مودال حجز للمشاركين --}}
@if($showBookingModal && $bazaarDetails)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50" wire:key="booking-modal-{{ $bazaarDetails->id }}">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full p-6 border border-indigo-400">
            <h2 class="text-xl font-bold text-indigo-600 dark:text-indigo-400 mb-4">حجز للمشاركين</h2>
            <div class="text-gray-700 dark:text-gray-200 mb-4">للحجز في بازار: <b>{{ $bazaarDetails->name }}</b></div>
            <div class="text-gray-700 dark:text-gray-200 mb-2">يرجى التواصل مع إدارة البازار أو استخدام النموذج لاحقًا.</div>
            <button type="button" wire:click="closeBookingModal" class="mt-4 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition-colors duration-200">
                إغلاق
            </button>
        </div>
    </div>
@endif

</div>
{{-- End of Livewire Component --}}
