<style>
svg.mx-auto,
svg.mx-auto.h-12.w-12,
svg.mx-auto.h-16.w-16,
svg.h-12.w-12,
svg.h-16.w-16 {
    width: 50px !important;
    height: 50px !important;
    max-width: 50px !important;
    max-height: 50px !important;
}
</style>

<div class="min-h-screen bg-gradient-to-br from-pink-50 to-purple-50 p-6" dir="rtl">
    {{-- Header --}}
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">النصائح العائلية</h1>
        <p class="mt-2 text-pink-100">نصائح وإرشادات من الخبراء لحياة عائلية أفضل</p>
    </div>

    {{-- Success/Error Messages --}}
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Add New Advice Button --}}
    <div class="mb-6">
        <button wire:click="showAdviceModal" 
                class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إضافة نصيحة جديدة
        </button>
    </div>

    {{-- Filter Section --}}
    <div class="rounded-lg shadow p-4 mb-6" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.1) 0%, rgba(236, 109, 169, 0.2) 100%);">
        <h3 class="text-lg font-semibold mb-3">تصفية النصائح</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">النوع</label>
                <select wire:model="selectedType" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    <option value="">جميع الأنواع</option>
                    <option value="طبيب نفسي">طبيب نفسي</option>
                    <option value="مرشد أسري اجتماعي">مرشد أسري اجتماعي</option>
                    <option value="مدرب حياة">مدرب حياة</option>
                    <option value="فيديو تعليمي">فيديو تعليمي</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">التصنيف</label>
                <select wire:model="selectedCategory" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    <option value="">جميع التصنيفات</option>
                    <option value="نصائح نفسية">نصائح نفسية</option>
                    <option value="إرشاد أسري">إرشاد أسري</option>
                    <option value="تربية الأطفال">تربية الأطفال</option>
                    <option value="العلاقات الزوجية">العلاقات الزوجية</option>
                    <option value="إدارة الضغوط">إدارة الضغوط</option>
                    <option value="التوازن بين العمل والحياة">التوازن بين العمل والحياة</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Advice Categories Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="rounded-lg shadow-lg p-6 text-center" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.1) 0%, rgba(236, 109, 169, 0.2) 100%);">
            <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">الأطباء النفسيون</h3>
            <p class="text-gray-600 text-sm">نصائح وإرشادات من أطباء نفسيين متخصصين</p>
        </div>

        <div class="rounded-lg shadow-lg p-6 text-center" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.1) 0%, rgba(236, 109, 169, 0.2) 100%);">
            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">المرشدون الأسريون</h3>
            <p class="text-gray-600 text-sm">إرشاد أسري واجتماعي متخصص</p>
        </div>

        <div class="rounded-lg shadow-lg p-6 text-center" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.1) 0%, rgba(236, 109, 169, 0.2) 100%);">
            <div class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">مدربو الحياة</h3>
            <p class="text-gray-600 text-sm">تدريب وتطوير نمط الحياة</p>
        </div>
    </div>

    {{-- Advice List --}}
    <div class="space-y-6">
        @forelse($adviceList as $advice)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $advice->title }}</h3>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-pink-100 text-pink-800 text-sm px-2 py-1 rounded">{{ $advice->type }}</span>
                                <span class="bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded">{{ $advice->category }}</span>
                                <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded">{{ $advice->target_audience }}</span>
                            </div>
                        </div>
                        
                        @if($advice->rating)
                            <div class="flex items-center">
                                <span class="text-yellow-400">★</span>
                                <span class="text-sm text-gray-600 ml-1">{{ $advice->rating }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="prose prose-gray max-w-none mb-4">
                        <p>{{ Str::limit($advice->content, 200) }}</p>
                    </div>

                    @if($advice->expert_name)
                        <div class="bg-gray-50 rounded-lg p-4 mb-4">
                            <h4 class="font-semibold text-gray-900 mb-2">معلومات الخبير</h4>
                            <p><strong>الاسم:</strong> {{ $advice->expert_name }}</p>
                            @if($advice->expert_credentials)
                                <p><strong>المؤهلات:</strong> {{ $advice->expert_credentials }}</p>
                            @endif
                            @if($advice->contact_info)
                                <p><strong>التواصل:</strong> {{ $advice->contact_info }}</p>
                            @endif
                        </div>
                    @endif

                    @if($advice->video_url)
                        <div class="mb-4">
                            <div class="bg-gray-100 rounded-lg p-4 flex items-center gap-3">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293H15M9 10V9a2 2 0 012-2h2a2 2 0 012 2v1m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v1"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">فيديو تعليمي متاح</p>
                                    @if($advice->duration_minutes)
                                        <p class="text-sm text-gray-600">المدة: {{ $advice->duration_minutes }} دقيقة</p>
                                    @endif
                                </div>
                                <a href="{{ $advice->video_url }}" target="_blank" 
                                   class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">
                                    مشاهدة
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($advice->is_featured)
                        <div class="mb-4">
                            <span class="bg-yellow-100 text-yellow-800 text-sm px-3 py-1 rounded-full">مميز</span>
                        </div>
                    @endif

                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>تم النشر: {{ $advice->created_at->diffForHumans() }}</span>
                        <div class="flex gap-2">
                            <button wire:click="editAdvice({{ $advice->id }})" class="text-blue-600 hover:text-blue-800">تعديل</button>
                            <button wire:click="deleteAdvice({{ $advice->id }})" class="text-red-600 hover:text-red-800">حذف</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                <p class="mt-2 text-gray-500">لا توجد نصائح مضافة بعد</p>
            </div>
        @endforelse
    </div>

    {{-- Advice Modal --}}
    @if ($showAdviceModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-screen overflow-y-auto" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">
                <div class="px-6 py-4" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة نصيحة عائلية</h3>
                </div>
                
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">عنوان النصيحة</label>
                            <input type="text" wire:model="adviceForm.title" 
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">نوع المصدر</label>
                                <select wire:model="adviceForm.type"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="">اختر النوع</option>
                                    <option value="طبيب نفسي">طبيب نفسي</option>
                                    <option value="مرشد أسري اجتماعي">مرشد أسري اجتماعي</option>
                                    <option value="مدرب حياة">مدرب حياة</option>
                                    <option value="فيديو تعليمي">فيديو تعليمي</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التصنيف</label>
                                <select wire:model="adviceForm.category"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="">اختر التصنيف</option>
                                    <option value="نصائح نفسية">نصائح نفسية</option>
                                    <option value="إرشاد أسري">إرشاد أسري</option>
                                    <option value="تربية الأطفال">تربية الأطفال</option>
                                    <option value="العلاقات الزوجية">العلاقات الزوجية</option>
                                    <option value="إدارة الضغوط">إدارة الضغوط</option>
                                    <option value="التوازن بين العمل والحياة">التوازن بين العمل والحياة</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الجمهور المستهدف</label>
                            <select wire:model="adviceForm.target_audience"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                <option value="">اختر الجمهور المستهدف</option>
                                <option value="الآباء">الآباء</option>
                                <option value="الأمهات">الأمهات</option>
                                <option value="الأطفال">الأطفال</option>
                                <option value="المراهقين">المراهقين</option>
                                <option value="الأزواج">الأزواج</option>
                                <option value="الجميع">الجميع</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">محتوى النصيحة</label>
                            <textarea wire:model="adviceForm.content" rows="6"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>

                        {{-- Expert Info --}}
                        <div class="border-t pt-4">
                            <h4 class="font-medium text-gray-900 mb-3">معلومات الخبير</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">اسم الخبير</label>
                                    <input type="text" wire:model="adviceForm.expert_name" 
                                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">المؤهلات</label>
                                    <input type="text" wire:model="adviceForm.expert_credentials" 
                                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">معلومات التواصل</label>
                                <input type="text" wire:model="adviceForm.contact_info" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        {{-- Video Info --}}
                        <div class="border-t pt-4">
                            <h4 class="font-medium text-gray-900 mb-3">معلومات الفيديو (اختياري)</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">رابط الفيديو</label>
                                    <input type="url" wire:model="adviceForm.video_url" 
                                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">مدة الفيديو (بالدقائق)</label>
                                    <input type="number" wire:model="adviceForm.duration_minutes" 
                                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">التقييم (1-5)</label>
                                <input type="number" min="1" max="5" step="0.1" wire:model="adviceForm.rating" 
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                            
                            <div class="flex items-center pt-6">
                                <input type="checkbox" wire:model="adviceForm.is_featured" id="is_featured"
                                       class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                                <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                                    نصيحة مميزة
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeAdviceModal" 
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveAdvice" 
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ النصيحة
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
