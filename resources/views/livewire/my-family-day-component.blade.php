<div class="min-h-screen bg-gradient-to-br from-pink-50 to-purple-50 p-6" dir="rtl">
    {{-- Header --}}
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">يوم العائلة</h1>
        <p class="mt-2 text-pink-100">اكتشف أفضل الأماكن والأنشطة لقضاء وقت ممتع مع العائلة</p>
    </div>

    {{-- Success/Error Messages --}}
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Action Buttons --}}
    <div class="flex flex-wrap gap-4 mb-6">
        <button wire:click="openOutingAreaModal" 
                class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إضافة مكان خروج
        </button>
        
        <button wire:click="openActivityModal" 
                class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إضافة نشاط
        </button>
    </div>

    {{-- Filter Section --}}
    <div class="rounded-lg shadow p-4 mb-6" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.1) 0%, rgba(236, 109, 169, 0.2) 100%);">
        <h3 class="text-lg font-semibold mb-3">تصفية حسب النوع</h3>
        <div class="flex flex-wrap gap-2">
            <button wire:click="$set('selectedType', '')" 
                    class="px-3 py-1 rounded {{ $selectedType == '' ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                الكل
            </button>
            <button wire:click="$set('selectedType', 'مطعم')" 
                    class="px-3 py-1 rounded {{ $selectedType == 'مطعم' ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                مطاعم
            </button>
            <button wire:click="$set('selectedType', 'كافيه')" 
                    class="px-3 py-1 rounded {{ $selectedType == 'كافيه' ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                كافيهات
            </button>
            <button wire:click="$set('selectedType', 'مخيم')" 
                    class="px-3 py-1 rounded {{ $selectedType == 'مخيم' ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                مخيمات
            </button>
            <button wire:click="$set('selectedType', 'فندق - استخدام يومي')" 
                    class="px-3 py-1 rounded {{ $selectedType == 'فندق - استخدام يومي' ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                فنادق - استخدام يومي
            </button>
        </div>
    </div>

    {{-- Tabs --}}
    <div class="mb-6">
        <nav class="flex space-x-8 rtl:space-x-reverse" aria-label="Tabs">
            <button class="bg-pink-500 text-white px-4 py-2 rounded-t-lg">أماكن الخروج</button>
            <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-t-lg">الأنشطة</button>
        </nav>
    </div>

    {{-- Outing Areas Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($outingAreas as $area)
            <div class="rounded-lg shadow-lg overflow-hidden" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.1) 0%, rgba(236, 109, 169, 0.2) 100%);">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">{{ $area->name }}</h3>
                            <span class="bg-pink-100 text-pink-800 text-sm px-2 py-1 rounded">{{ $area->type }}</span>
                        </div>
                        @if($area->rating)
                            <div class="flex items-center">
                                <span class="text-yellow-400">★</span>
                                <span class="text-sm text-gray-600 ml-1">{{ $area->rating }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="space-y-2 text-sm text-gray-600">
                        <p><strong>العنوان:</strong> {{ $area->address }}</p>
                        
                        @if($area->phone)
                            <p><strong>الهاتف:</strong> {{ $area->phone }}</p>
                        @endif
                        
                        @if($area->working_hours)
                            <p><strong>ساعات العمل:</strong> {{ $area->working_hours }}</p>
                        @endif
                        
                        @if($area->price_range)
                            <p><strong>نطاق الأسعار:</strong> {{ $area->price_range }}</p>
                        @endif
                        
                        @if($area->age_group)
                            <p><strong>الفئة العمرية:</strong> {{ $area->age_group }}</p>
                        @endif
                        
                        @if($area->description)
                            <p><strong>الوصف:</strong> {{ Str::limit($area->description, 100) }}</p>
                        @endif
                    </div>

                    @if($area->family_friendly)
                        <div class="mt-3">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">مناسب للعائلات</span>
                        </div>
                    @endif

                    <div class="mt-4 flex gap-2">
                        <button wire:click="editOutingArea({{ $area->id }})" 
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                            تعديل
                        </button>
                        <button wire:click="deleteOutingArea({{ $area->id }})" 
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                            حذف
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <p class="mt-2 text-gray-500">لا توجد أماكن خروج مضافة بعد</p>
            </div>
        @endforelse
    </div>

    {{-- Outing Area Modal --}}
    @if ($showOutingAreaModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-screen overflow-y-auto" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة مكان خروج عائلي</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم المكان</label>
                                <input type="text" wire:model="outingAreaForm.name" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">نوع المكان</label>
                                <select wire:model="outingAreaForm.type"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="">اختر النوع</option>
                                    <option value="مطعم">مطعم</option>
                                    <option value="كافيه">كافيه</option>
                                    <option value="مخيم">مخيم</option>
                                    <option value="فندق - استخدام يومي">فندق - استخدام يومي</option>
                                    <option value="مركز تسوق">مركز تسوق</option>
                                    <option value="متحف">متحف</option>
                                    <option value="حديقة">حديقة</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <textarea wire:model="outingAreaForm.address" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">رقم الهاتف</label>
                                <input type="tel" wire:model="outingAreaForm.phone" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التقييم (1-5)</label>
                                <input type="number" min="1" max="5" step="0.1" wire:model="outingAreaForm.rating" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">نطاق الأسعار</label>
                                <input type="text" wire:model="outingAreaForm.price_range" 
                                       placeholder="مثل: 50-100 ريال" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">ساعات العمل</label>
                                <input type="text" wire:model="outingAreaForm.working_hours" 
                                       placeholder="9 صباحاً - 11 مساءً" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الفئة العمرية المناسبة</label>
                            <input type="text" wire:model="outingAreaForm.age_group" 
                                   placeholder="مثل: جميع الأعمار، أطفال 3-12 سنة" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الوصف</label>
                            <textarea wire:model="outingAreaForm.description" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الموقع الإلكتروني</label>
                            <input type="url" wire:model="outingAreaForm.website" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ملاحظات خاصة</label>
                            <textarea wire:model="outingAreaForm.special_notes" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeOutingAreaModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveOutingArea" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ المكان
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Activity Modal --}}
    @if ($showActivityModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-screen overflow-y-auto" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة نشاط عائلي</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم النشاط</label>
                                <input type="text" wire:model="activityForm.activity_name" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التصنيف</label>
                                <select wire:model="activityForm.category"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="">اختر التصنيف</option>
                                    <option value="مخيمات">مخيمات</option>
                                    <option value="استخدام يومي في الفنادق">استخدام يومي في الفنادق</option>
                                    <option value="أنشطة رياضية">أنشطة رياضية</option>
                                    <option value="ورش عمل">ورش عمل</option>
                                    <option value="رحلات استكشافية">رحلات استكشافية</option>
                                    <option value="أنشطة ثقافية">أنشطة ثقافية</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">وصف النشاط</label>
                            <textarea wire:model="activityForm.description" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الموقع</label>
                            <textarea wire:model="activityForm.location" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">المنظم</label>
                                <input type="text" wire:model="activityForm.organizer" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">هاتف التواصل</label>
                                <input type="tel" wire:model="activityForm.contact_phone" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التكلفة</label>
                                <input type="number" step="0.01" wire:model="activityForm.cost" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">المدة</label>
                                <input type="text" wire:model="activityForm.duration" 
                                       placeholder="مثل: 3 ساعات، يومين" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">الفئة العمرية</label>
                                <input type="text" wire:model="activityForm.age_group" 
                                       placeholder="مثل: 5-15 سنة" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">متاح من</label>
                                <input type="date" wire:model="activityForm.available_from" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">متاح إلى</label>
                                <input type="date" wire:model="activityForm.available_to" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">طريقة الحجز</label>
                            <input type="text" wire:model="activityForm.booking_method" 
                                   placeholder="مثل: حجز مسبق، حضور مباشر" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">المميزات الخاصة</label>
                            <textarea wire:model="activityForm.special_features" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeActivityModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveActivity" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ النشاط
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
