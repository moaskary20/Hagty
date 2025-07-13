<x-filament-panels::page>
    <div class="space-y-8">
        <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg p-6">
            <h1 class="text-3xl font-bold">كيف تكونين أمًا</h1>
            <p class="mt-2 text-pink-100">دليلكِ الشامل للأمومة الحديثة والصحيحة</p>
        </div>

        <div class="bg-custom-dark rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">نصائح الخبراء</h2>
                <button wire:click="openExpertAdviceModal" 
                        class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة نصيحة جديدة
                </button>
            </div>
            @if($this->expertAdvices && $this->expertAdvices->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($this->expertAdvices as $advice)
                    <div class="bg-pink-50 dark:bg-gray-700 rounded-lg p-4 border">
                        <h3 class="font-semibold text-gray-900 dark:text-white">{{ $advice->expert_name }}</h3>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ Str::limit($advice->content, 150) }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-400">
                    <p>لا توجد نصائح خبراء متاحة حالياً</p>
                </div>
            @endif
        </div>

        <div class="bg-custom-dark rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">استمعي لجدتك</h2>
                <button wire:click="openGrandmaAdviceModal" 
                        class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة نصيحة جديدة
                </button>
            </div>
            @if($this->grandmaAdvices && $this->grandmaAdvices->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($this->grandmaAdvices as $advice)
                    <div class="bg-amber-50 dark:bg-gray-700 rounded-lg p-4 border">
                        <h3 class="font-semibold text-gray-900 dark:text-white">{{ $advice->grandma_name }}</h3>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ Str::limit($advice->content, 150) }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-400">
                    <p>لا توجد نصائح من الجدات متاحة حالياً</p>
                </div>
            @endif
        </div>

        <div class="bg-custom-dark rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">حلقات بودكاست</h2>
                <button wire:click="openPodcastModal" 
                        class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة حلقة جديدة
                </button>
            </div>
            @if($this->podcastEpisodes && $this->podcastEpisodes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($this->podcastEpisodes as $episode)
                    <div class="bg-indigo-50 dark:bg-gray-700 rounded-lg p-4 border">
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">{{ $episode->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">{{ Str::limit($episode->description, 100) }}</p>
                        <div class="text-sm text-indigo-600">{{ $episode->duration }} دقيقة</div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-400">
                    <p>لا توجد حلقات بودكاست متاحة حالياً</p>
                </div>
            @endif
        </div>
    </div>

    {{-- المودالات --}}
    @if($showExpertAdviceModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-custom-dark rounded-lg w-full max-w-md p-6 border border-gray-600">
                <h3 class="text-xl font-bold text-white mb-4">
                    {{ $editingExpertAdvice ? 'تعديل نصيحة الخبير' : 'إضافة نصيحة خبير جديدة' }}
                </h3>
                
                <form wire:submit.prevent="saveExpertAdvice" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">اسم الخبير</label>
                        <input type="text" wire:model="expertAdviceForm.expert_name" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                        @error('expertAdviceForm.expert_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">المسمى الوظيفي</label>
                        <input type="text" wire:model="expertAdviceForm.expert_title" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">عنوان النصيحة</label>
                        <input type="text" wire:model="expertAdviceForm.title" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                        @error('expertAdviceForm.title') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">المحتوى</label>
                        <textarea wire:model="expertAdviceForm.content" rows="3" 
                                  class="w-full rounded-lg border-gray-600 bg-gray-700 text-white"></textarea>
                        @error('expertAdviceForm.content') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">رابط الفيديو (اختياري)</label>
                        <input type="url" wire:model="expertAdviceForm.video_url" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" wire:click="closeExpertAdviceModal" 
                                class="px-4 py-2 text-gray-300 hover:text-white">إلغاء</button>
                        <button type="submit" 
                                class="px-6 py-2 bg-pink-500 hover:bg-pink-600 text-white rounded-lg">
                            {{ $editingExpertAdvice ? 'تحديث' : 'حفظ' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if($showGrandmaAdviceModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-custom-dark rounded-lg w-full max-w-md p-6 border border-gray-600">
                <h3 class="text-xl font-bold text-white mb-4">
                    {{ $editingGrandmaAdvice ? 'تعديل نصيحة الجدة' : 'إضافة نصيحة جدة جديدة' }}
                </h3>
                
                <form wire:submit.prevent="saveGrandmaAdvice" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">اسم الجدة</label>
                        <input type="text" wire:model="grandmaAdviceForm.grandma_name" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                        @error('grandmaAdviceForm.grandma_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">المنطقة</label>
                        <input type="text" wire:model="grandmaAdviceForm.region" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">عنوان النصيحة</label>
                        <input type="text" wire:model="grandmaAdviceForm.title" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                        @error('grandmaAdviceForm.title') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">المحتوى</label>
                        <textarea wire:model="grandmaAdviceForm.content" rows="3" 
                                  class="w-full rounded-lg border-gray-600 bg-gray-700 text-white"></textarea>
                        @error('grandmaAdviceForm.content') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">الفئة</label>
                        <select wire:model="grandmaAdviceForm.category" 
                                class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                            <option value="">اختر الفئة</option>
                            <option value="تغذية">تغذية</option>
                            <option value="صحة">صحة</option>
                            <option value="تربية">تربية</option>
                            <option value="نوم">نوم</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" wire:click="closeGrandmaAdviceModal" 
                                class="px-4 py-2 text-gray-300 hover:text-white">إلغاء</button>
                        <button type="submit" 
                                class="px-6 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg">
                            {{ $editingGrandmaAdvice ? 'تحديث' : 'حفظ' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if($showPodcastModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-custom-dark rounded-lg w-full max-w-md p-6 border border-gray-600">
                <h3 class="text-xl font-bold text-white mb-4">
                    {{ $editingPodcast ? 'تعديل حلقة البودكاست' : 'إضافة حلقة بودكاست جديدة' }}
                </h3>
                
                <form wire:submit.prevent="savePodcast" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">عنوان الحلقة</label>
                        <input type="text" wire:model="podcastForm.title" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                        @error('podcastForm.title') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">الوصف</label>
                        <textarea wire:model="podcastForm.description" rows="3" 
                                  class="w-full rounded-lg border-gray-600 bg-gray-700 text-white"></textarea>
                        @error('podcastForm.description') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">رابط الصوت</label>
                        <input type="url" wire:model="podcastForm.audio_url" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                        @error('podcastForm.audio_url') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">المدة (بالدقائق)</label>
                        <input type="number" wire:model="podcastForm.duration" 
                               class="w-full rounded-lg border-gray-600 bg-gray-700 text-white">
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" wire:click="closePodcastModal" 
                                class="px-4 py-2 text-gray-300 hover:text-white">إلغاء</button>
                        <button type="submit" 
                                class="px-6 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg">
                            {{ $editingPodcast ? 'تحديث' : 'حفظ' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Custom CSS --}}
    <style>
        .bg-custom-dark {
            --tw-bg-opacity: 1;
            background-color: rgb(32 30 30);
        }
        
        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(32 30 30);
        }
        
        /* إضافة hover effects للأزرار */
        button:hover {
            transform: translateY(-1px);
            transition: all 0.2s ease;
        }
        
        /* تحسين مظهر الكروت */
        .grid > div {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .grid > div:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        /* تحسين مظهر المودالات */
        .fixed.inset-0 {
            backdrop-filter: blur(4px);
        }
        
        /* تحسين مظهر الفورم */
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #ec4899;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }
    </style>
</x-filament-panels::page>
