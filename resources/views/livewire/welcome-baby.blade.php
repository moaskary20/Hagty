<div class="min-h-screen bg-gradient-to-br from-pink-200 via-pink-100 to-rose-200">
    <style>
    .bg-custom-dark {
        background-color: rgb(255, 255, 255);
        border: 1px solid rgb(229, 231, 235);
    }
    </style>
    
    {{-- عرض رسائل النجاح والخطأ --}}
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg shadow-md">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-800 rounded-lg shadow-md">
            {{ session('error') }}
        </div>
    @endif

    <div class="p-6 space-y-8">
        {{-- عنوان الصفحة --}}
        <div class="bg-gradient-to-r from-blue-500 to-green-600 text-white rounded-lg p-6">
            <h1 class="text-3xl font-bold">مرحباً بالطفل</h1>
            <p class="mt-2 text-blue-100">دليلكِ الشامل لرعاية طفلكِ الجديد</p>
        </div>

        {{-- قسم خطوات الطفل اليومية --}}
        <div class="bg-custom-dark rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">خطوات الطفل اليومية</h2>
                <button wire:click="openDayStepModal" 
                        onclick="console.log('تم النقر على زر إضافة خطوة جديدة')"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة خطوة جديدة
                </button>
            </div>
            
            @if($this->babyDaySteps && $this->babyDaySteps->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($this->babyDaySteps as $step)
                    <div class="bg-blue-50 dark:bg-gray-700 rounded-lg p-4 border border-blue-200">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-gray-900 font-bold text-sm">{{ $step->step_number }}</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">{{ $step->title }}</h3>
                                <p class="text-xs text-blue-600">{{ $step->age_group }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ Str::limit($step->description, 100) }}</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs text-blue-600 font-medium">{{ $step->category }}</span>
                            <button wire:click="editDayStep({{ $step->id }})" 
                                    class="text-blue-500 hover:text-blue-700 text-sm">
                                تعديل
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <div class="text-gray-400 mb-4">
                        <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700">لا توجد خطوات مضافة بعد</p>
                    <p class="text-gray-400 text-sm">اضغطي على "إضافة خطوة جديدة" لبدء إضافة محتوى</p>
                </div>
            @endif
        </div>

        {{-- قسم المعلومات الصحية --}}
        <div class="bg-custom-dark rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">معلومات صحية</h2>
                <button wire:click="openHealthInfoModal" 
                        onclick="console.log('تم النقر على زر المعلومات الصحية')"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة معلومة صحية
                </button>
            </div>
            
            @if($this->babyHealthInfos && $this->babyHealthInfos->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($this->babyHealthInfos as $info)
                    <div class="bg-green-50 dark:bg-gray-700 rounded-lg p-4 border border-green-200">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">{{ $info->title }}</h3>
                                <p class="text-xs text-green-600">{{ $info->age_range }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ Str::limit($info->content, 100) }}</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs text-green-600 font-medium">{{ $info->category }}</span>
                            <button wire:click="editHealthInfo({{ $info->id }})" 
                                    class="text-green-500 hover:text-green-700 text-sm">
                                تعديل
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <div class="text-gray-400 mb-4">
                        <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700">لا توجد معلومات صحية مضافة بعد</p>
                </div>
            @endif
        </div>

        {{-- باقي الأقسام... --}}
        <div class="bg-custom-dark rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">نصائح الخبراء</h2>
                <button wire:click="openExpertAdviceModal" 
                        onclick="console.log('تم النقر على زر نصائح الخبراء')"
                        class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة نصيحة خبير
                </button>
            </div>
            
            @if($this->babyExpertAdvices && $this->babyExpertAdvices->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($this->babyExpertAdvices as $advice)
                    <div class="bg-purple-50 dark:bg-gray-700 rounded-lg p-4 border border-purple-200">
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">{{ $advice->title }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 text-sm mb-3">{{ Str::limit($advice->content, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-xs font-medium text-purple-600">{{ $advice->expert_name }}</p>
                                <p class="text-xs text-purple-500">{{ $advice->expert_specialty }}</p>
                            </div>
                            <button wire:click="editExpertAdvice({{ $advice->id }})" 
                                    class="text-purple-500 hover:text-purple-700 text-sm">
                                تعديل
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-700">لا توجد نصائح خبراء مضافة بعد</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Modal خطوات الطفل اليومية --}}
    @if ($showDayStepModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        {{ $editingDayStep ? 'تعديل' : 'إضافة' }} خطوة يومية
                    </h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <input type="text" wire:model="dayStepForm.title" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('dayStepForm.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الوصف</label>
                            <textarea wire:model="dayStepForm.description" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            @error('dayStepForm.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">رقم الخطوة</label>
                                <input type="number" wire:model="dayStepForm.step_number" min="1"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">الفئة العمرية</label>
                                <input type="text" wire:model="dayStepForm.age_group"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التصنيف</label>
                                <select wire:model="dayStepForm.category"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">اختر التصنيف</option>
                                    <option value="العناية الشخصية">العناية الشخصية</option>
                                    <option value="التغذية">التغذية</option>
                                    <option value="النوم">النوم</option>
                                    <option value="اللعب">اللعب</option>
                                    <option value="التطوير">التطوير</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">مستوى الصعوبة</label>
                                <select wire:model="dayStepForm.difficulty_level"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="سهل">سهل</option>
                                    <option value="متوسط">متوسط</option>
                                    <option value="صعب">صعب</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-2 rtl:space-x-reverse">
                    <button wire:click="closeDayStepModal" 
                            class="px-4 py-2 text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200">
                        إلغاء
                    </button>
                    <button wire:click="saveDayStep" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        {{ $editingDayStep ? 'تحديث' : 'حفظ' }}
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal المعلومات الصحية --}}
    @if ($showHealthInfoModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        {{ $editingHealthInfo ? 'تعديل' : 'إضافة' }} معلومة صحية
                    </h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <input type="text" wire:model="healthInfoForm.title" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                            @error('healthInfoForm.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">المحتوى</label>
                            <textarea wire:model="healthInfoForm.content" rows="4"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                            @error('healthInfoForm.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التصنيف</label>
                                <select wire:model="healthInfoForm.category"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                                    <option value="">اختر التصنيف</option>
                                    <option value="التغذية">التغذية</option>
                                    <option value="الصحة العامة">الصحة العامة</option>
                                    <option value="النمو">النمو</option>
                                    <option value="الوقاية">الوقاية</option>
                                    <option value="التطعيمات">التطعيمات</option>
                                </select>
                                @error('healthInfoForm.category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">الفئة العمرية</label>
                                <input type="text" wire:model="healthInfoForm.age_range" placeholder="مثال: 0-6 أشهر"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                                @error('healthInfoForm.age_range') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-2 rtl:space-x-reverse">
                    <button wire:click="closeHealthInfoModal" 
                            class="px-4 py-2 text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200">
                        إلغاء
                    </button>
                    <button wire:click="saveHealthInfo" 
                            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                        {{ $editingHealthInfo ? 'تحديث' : 'حفظ' }}
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal نصائح الخبراء --}}
    @if ($showExpertAdviceModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        {{ $editingExpertAdvice ? 'تعديل' : 'إضافة' }} نصيحة خبير
                    </h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <input type="text" wire:model="expertAdviceForm.title" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            @error('expertAdviceForm.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">المحتوى</label>
                            <textarea wire:model="expertAdviceForm.content" rows="4"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                            @error('expertAdviceForm.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم الخبير</label>
                                <input type="text" wire:model="expertAdviceForm.expert_name"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التخصص</label>
                                <input type="text" wire:model="expertAdviceForm.expert_specialty"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">التصنيف</label>
                            <select wire:model="expertAdviceForm.category"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="">اختر التصنيف</option>
                                <option value="التغذية">التغذية</option>
                                <option value="النمو">النمو</option>
                                <option value="الصحة النفسية">الصحة النفسية</option>
                                <option value="الأمان">الأمان</option>
                                <option value="التربية">التربية</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-2 rtl:space-x-reverse">
                    <button wire:click="closeExpertAdviceModal" 
                            class="px-4 py-2 text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200">
                        إلغاء
                    </button>
                    <button wire:click="saveExpertAdvice" 
                            class="px-4 py-2 bg-purple-500 text-white rounded-md hover:bg-purple-600">
                        {{ $editingExpertAdvice ? 'تحديث' : 'حفظ' }}
                    </button>
                </div>
            </div>
        </div>
    @endif

    </div>
</div>
