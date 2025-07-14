<div class="min-h-screen" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.08) 0%, rgba(236, 109, 169, 0.15) 50%, rgba(236, 109, 169, 0.12) 100%)">
    <style>
    .bg-custom-light {
        background: linear-gradient(135deg, rgba(236, 109, 169, 0.1) 0%, rgba(236, 109, 169, 0.25) 100%);
        border: 1px solid rgba(236, 109, 169, 0.3);
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(236, 109, 169, 0.15);
    }
    
    /* تصغير الأيقونات */
    svg.mx-auto.h-12.w-12.text-gray-400 {
        width: 50px;
        height: 50px;
    }
    
    /* تصغير جميع الأيقونات الكبيرة */
    .h-12.w-12 {
        width: 50px !important;
        height: 50px !important;
    }
    
    .h-16.w-16 {
        width: 60px !important;
        height: 60px !important;
    }
    </style>
    
    {{-- عرض رسائل النجاح والخطأ --}}
    @if (session()->has('message'))
                  <div class="rounded-lg shadow-xl max-w-lg w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة عنصر للقائمة</h3>
                </div>iv class="mb-4 p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg shadow-md">
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
            <h1 class="text-2xl font-bold">مرحباً بالطفل</h1>
            <p class="mt-2 text-blue-100">دليلكِ الشامل لرعاية طفلكِ الجديد</p>
        </div>

        {{-- الأقسام الرئيسية --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- 1. خطوات الطفل اليومية --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">خطوات الطفل اليومية</h2>
                    <button wire:click="openDayStepModal" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة خطوة جديدة
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">خطوات يومية للعناية بالطفل</p>
                </div>
            </div>

            {{-- 2. المعلومات الصحية --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">المعلومات الصحية</h2>
                    <button wire:click="openHealthInfoModal" 
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة معلومة صحية
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">معلومات صحية مهمة للطفل</p>
                </div>
            </div>

            {{-- 3. نصائح الخبراء --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">نصائح الخبراء</h2>
                    <button wire:click="openExpertAdviceModal" 
                            class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded-lg flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة نصيحة خبير
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">نصائح من خبراء الأطفال</p>
                </div>
            </div>

            {{-- 4. نصائح الأطباء --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">نصائح الأطباء</h2>
                    <button wire:click="openDoctorTipModal" 
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة نصيحة طبيب
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">نصائح طبية متخصصة</p>
                </div>
            </div>

            {{-- 5. النمو الشهري --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">النمو الشهري</h2>
                    <button wire:click="openMonthlyGrowthModal" 
                            class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded-lg flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة معلومات النمو
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">تطور الطفل شهرياً</p>
                </div>
            </div>

            {{-- 6. قائمة البيبي شاور --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">قائمة البيبي شاور</h2>
                    <button wire:click="openShowerListModal" 
                            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة عنصر للقائمة
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">قائمة احتياجات المولود</p>
                </div>
            </div>
        </div>

        {{-- القسم الثاني: الأطباء والخدمات --}}
        <div class="bg-gradient-to-r from-teal-500 to-blue-600 text-white rounded-lg p-6 mt-8">
            <h1 class="text-xl font-bold">أطباء الأطفال والخدمات</h1>
            <p class="mt-2 text-teal-100">معلومات الأطباء والخدمات الطبية</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- 7. تسجيل بيانات صحة الطفل --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">بيانات صحة الطفل</h2>
                    <button wire:click="openBabyHealthModal" 
                            class="bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-1 rounded-lg flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        تسجيل بيانات صحية
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">السجل الصحي للطفل</p>
                </div>
            </div>

            {{-- 8. معلومات أطباء الأطفال --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">أطباء الأطفال</h2>
                    <button wire:click="openKidDoctorModal" 
                            class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة طبيب أطفال
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">معلومات الأطباء المتابعين</p>
                </div>
            </div>

            {{-- 9. جهات الاتصال الطارئة --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">الاتصال الطارئ</h2>
                    <button wire:click="openEmergencyModal" 
                            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة جهة اتصال
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">أرقام الطوارئ والعائلة</p>
                </div>
            </div>

            {{-- 10. دليل الحضانات --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">دليل الحضانات</h2>
                    <button wire:click="openNurseryModal" 
                            class="bg-violet-500 hover:bg-violet-600 text-white px-3 py-1 rounded-lg flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة حضانة
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">حضانات في منطقتك</p>
                </div>
            </div>

            {{-- 11. أماكن اللعب --}}
            <div class="bg-custom-light rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">أماكن اللعب</h2>
                    <button wire:click="openPlayingAreaModal" 
                            class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded-lg flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        إضافة منطقة لعب
                    </button>
                </div>
                <div class="text-center py-8">
                    <p class="text-gray-700">أماكن ترفيهية للأطفال</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal خطوات الطفل اليومية --}}
    @if ($showDayStepModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px); border: 1px solid rgba(236, 109, 169, 0.3);">
                <div class="px-6 py-4 border-b" style="border-color: rgba(236, 109, 169, 0.2);">
                    <h3 class="text-lg font-medium text-gray-800">إضافة خطوة يومية</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <input type="text" wire:model="dayStepForm.title" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الوصف</label>
                            <textarea wire:model="dayStepForm.description" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
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
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeDayStepModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveDayStep" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal المعلومات الصحية --}}
    @if ($showHealthInfoModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px); border: 1px solid rgba(236, 109, 169, 0.3);">
                <div class="px-6 py-4 border-b" style="border-color: rgba(236, 109, 169, 0.2);">
                    <h3 class="text-lg font-medium text-gray-800">إضافة معلومة صحية</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <input type="text" wire:model="healthInfoForm.title" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">المحتوى</label>
                            <textarea wire:model="healthInfoForm.content" rows="4"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">التصنيف</label>
                            <select wire:model="healthInfoForm.category"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">اختر التصنيف</option>
                                <option value="التغذية">التغذية</option>
                                <option value="الصحة العامة">الصحة العامة</option>
                                <option value="النمو">النمو</option>
                                <option value="الوقاية">الوقاية</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeHealthInfoModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveHealthInfo" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal نصائح الخبراء --}}
    @if ($showExpertAdviceModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px); border: 1px solid rgba(236, 109, 169, 0.3);">
                <div class="px-6 py-4 border-b" style="border-color: rgba(236, 109, 169, 0.2);">
                    <h3 class="text-lg font-medium text-gray-800">إضافة نصيحة خبير</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <input type="text" wire:model="expertAdviceForm.title" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">المحتوى</label>
                            <textarea wire:model="expertAdviceForm.content" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
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
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeExpertAdviceModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveExpertAdvice" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal نصائح الأطباء --}}
    @if ($showDoctorTipModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px); border: 1px solid rgba(236, 109, 169, 0.3);">
                <div class="px-6 py-4 border-b" style="border-color: rgba(236, 109, 169, 0.2);">
                    <h3 class="text-lg font-medium text-gray-800">إضافة نصيحة طبيب</h3>
                </div>
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">إضافة نصيحة طبيب</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <input type="text" wire:model="doctorTipForm.title" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">المحتوى</label>
                            <textarea wire:model="doctorTipForm.content" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم الطبيب</label>
                                <input type="text" wire:model="doctorTipForm.doctor_name"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التخصص</label>
                                <input type="text" wire:model="doctorTipForm.specialization"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">مستوى الأهمية</label>
                            <select wire:model="doctorTipForm.urgency_level"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                                <option value="منخفض">منخفض</option>
                                <option value="متوسط">متوسط</option>
                                <option value="عالي">عالي</option>
                                <option value="عاجل">عاجل</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeDoctorTipModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveDoctorTip" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal النمو الشهري --}}
    @if ($showMonthlyGrowthModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px); border: 1px solid rgba(236, 109, 169, 0.3);">
                <div class="px-6 py-4 border-b" style="border-color: rgba(236, 109, 169, 0.2);">
                    <h3 class="text-lg font-medium text-gray-800">إضافة معلومات النمو</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">رقم الشهر</label>
                                <input type="number" min="1" max="36" wire:model="monthlyGrowthForm.month_number" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                                <input type="text" wire:model="monthlyGrowthForm.title"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الوصف</label>
                            <textarea wire:model="monthlyGrowthForm.description" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">التطور الجسدي</label>
                            <textarea wire:model="monthlyGrowthForm.physical_development" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">التطور المعرفي</label>
                            <textarea wire:model="monthlyGrowthForm.cognitive_development" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeMonthlyGrowthModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveMonthlyGrowth" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif 

    {{-- Modal قائمة البيبي شاور --}}
    @if ($showShowerListModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة عنصر لقائمة البيبي شاور</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">اسم العنصر</label>
                            <input type="text" wire:model="showerListForm.item_name" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الوصف</label>
                            <textarea wire:model="showerListForm.description" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التصنيف</label>
                                <select wire:model="showerListForm.category"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="">اختر التصنيف</option>
                                    <option value="ملابس">ملابس</option>
                                    <option value="أدوات العناية">أدوات العناية</option>
                                    <option value="ألعاب">ألعاب</option>
                                    <option value="أثاث">أثاث</option>
                                    <option value="تغذية">تغذية</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">الأولوية</label>
                                <select wire:model="showerListForm.priority"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="منخفض">منخفض</option>
                                    <option value="متوسط">متوسط</option>
                                    <option value="عالي">عالي</option>
                                    <option value="ضروري">ضروري</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeShowerListModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveShowerList" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal جهات الاتصال الطارئة --}}
    @if ($showEmergencyModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة جهة اتصال طارئة</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم جهة الاتصال</label>
                                <input type="text" wire:model="emergencyForm.contact_name" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">العلاقة</label>
                                <select wire:model="emergencyForm.relationship"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    <option value="">اختر العلاقة</option>
                                    <option value="الأب">الأب</option>
                                    <option value="الأم">الأم</option>
                                    <option value="الجد">الجد</option>
                                    <option value="الجدة">الجدة</option>
                                    <option value="العم">العم</option>
                                    <option value="العمة">العمة</option>
                                    <option value="الخال">الخال</option>
                                    <option value="الخالة">الخالة</option>
                                    <option value="صديق العائلة">صديق العائلة</option>
                                    <option value="طبيب">طبيب</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">رقم الهاتف</label>
                                <input type="tel" wire:model="emergencyForm.phone"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">هاتف الطوارئ</label>
                                <input type="tel" wire:model="emergencyForm.emergency_phone"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <textarea wire:model="emergencyForm.address" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" wire:model="emergencyForm.is_primary" id="is_primary"
                                   class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                            <label for="is_primary" class="ml-2 block text-sm text-gray-900">
                                جهة الاتصال الأساسية
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeEmergencyModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveEmergency" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal تسجيل بيانات صحة الطفل --}}
    @if ($showBabyHealthModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">تسجيل بيانات صحة الطفل</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التاريخ</label>
                                <input type="date" wire:model="babyHealthForm.record_date" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">الوزن (كجم)</label>
                                <input type="number" step="0.1" wire:model="babyHealthForm.weight"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">الطول (سم)</label>
                                <input type="number" step="0.1" wire:model="babyHealthForm.height"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">درجة الحرارة</label>
                                <input type="number" step="0.1" wire:model="babyHealthForm.temperature"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ملاحظات طبية</label>
                            <textarea wire:model="babyHealthForm.medical_notes" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">التطعيمات</label>
                            <textarea wire:model="babyHealthForm.vaccinations" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeBabyHealthModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveBabyHealth" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal أطباء الأطفال --}}
    @if ($showKidDoctorModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة طبيب أطفال</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم الطبيب</label>
                                <input type="text" wire:model="kidDoctorForm.doctor_name" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التخصص</label>
                                <input type="text" wire:model="kidDoctorForm.specialization"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">رقم الهاتف</label>
                                <input type="tel" wire:model="kidDoctorForm.phone"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">العيادة/المستشفى</label>
                                <input type="text" wire:model="kidDoctorForm.clinic_hospital"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <textarea wire:model="kidDoctorForm.address" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">ساعات العمل</label>
                                <input type="text" wire:model="kidDoctorForm.working_hours"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">سعر الكشف</label>
                                <input type="number" wire:model="kidDoctorForm.consultation_fee"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeKidDoctorModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveKidDoctor" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal الحضانات --}}
    @if ($showNurseryModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة حضانة</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم الحضانة</label>
                                <input type="text" wire:model="nurseryForm.nursery_name" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">رقم الهاتف</label>
                                <input type="tel" wire:model="nurseryForm.phone"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <textarea wire:model="nurseryForm.address" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">العمر المطلوب (من)</label>
                                <input type="number" wire:model="nurseryForm.age_from"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">العمر المطلوب (إلى)</label>
                                <input type="number" wire:model="nurseryForm.age_to"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">الرسوم الشهرية</label>
                                <input type="number" wire:model="nurseryForm.monthly_fee"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">ساعات العمل</label>
                                <input type="text" wire:model="nurseryForm.working_hours"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الخدمات المقدمة</label>
                            <textarea wire:model="nurseryForm.services" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeNurseryModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveNursery" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal مناطق اللعب --}}
    @if ($showPlayingAreaModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-md w-full mx-4" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة منطقة لعب</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم المنطقة</label>
                                <input type="text" wire:model="playingAreaForm.area_name" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">النوع</label>
                                <select wire:model="playingAreaForm.area_type"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="">اختر النوع</option>
                                    <option value="حديقة عامة">حديقة عامة</option>
                                    <option value="منطقة لعب مغطاة">منطقة لعب مغطاة</option>
                                    <option value="نادي أطفال">نادي أطفال</option>
                                    <option value="مركز ترفيهي">مركز ترفيهي</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                            <textarea wire:model="playingAreaForm.address" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">العمر المناسب (من)</label>
                                <input type="number" wire:model="playingAreaForm.age_from"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">العمر المناسب (إلى)</label>
                                <input type="number" wire:model="playingAreaForm.age_to"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">ساعات العمل</label>
                                <input type="text" wire:model="playingAreaForm.working_hours"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">رسوم الدخول</label>
                                <input type="number" wire:model="playingAreaForm.entry_fee"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">وصف المرافق</label>
                            <textarea wire:model="playingAreaForm.facilities" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" wire:model="playingAreaForm.has_parking" id="has_parking"
                                   class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                            <label for="has_parking" class="ml-2 block text-sm text-gray-900">
                                يتوفر موقف سيارات
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closePlayingAreaModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="savePlayingArea" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
