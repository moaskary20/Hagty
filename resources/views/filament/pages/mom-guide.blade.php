<x-filament::page>
    <div class="space-y-6">
        {{-- عنوان الصفحة --}}
        <div class="fi-card p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800">كيف تكونين أمًا</h3>
            <p class="text-sm text-gray-600 mt-2">دليلكِ الشامل للأمومة الحديثة والصحيحة</p>
        </div>

        {{-- قسم نصائح الخبراء --}}
        <div class="fi-card p-6 mb-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">نصائح الخبراء</h2>
                <button wire:click="openExpertAdviceModal" 
                        class="fi-btn bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة نصيحة جديدة
                </button>
            </div>
            
            @if($this->expertAdvices && $this->expertAdvices->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($this->expertAdvices as $advice)
                    <div class="fi-card p-4 border border-pink-200">
                        <h3 class="font-semibold text-gray-800">{{ $advice->expert_name }}</h3>
                        <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 text-sm">{{ Str::limit($advice->content, 150) }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-600">
                    <p>لا توجد نصائح خبراء متاحة حالياً</p>
                </div>
            @endif
        </div>

        {{-- قسم نصائح الجدات --}}
        <div class="fi-card p-6 mb-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">استمعي لجدتك</h2>
                <button wire:click="openGrandmaAdviceModal" 
                        class="fi-btn bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة نصيحة جديدة
                </button>
            </div>
            
            @if($this->grandmaAdvices && $this->grandmaAdvices->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($this->grandmaAdvices as $advice)
                    <div class="fi-card p-4 border border-amber-200">
                        <h3 class="font-semibold text-gray-800">{{ $advice->grandma_name }}</h3>
                        <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 text-sm">{{ Str::limit($advice->content, 150) }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-600">
                    <p>لا توجد نصائح من الجدات متاحة حالياً</p>
                </div>
            @endif
        </div>

        {{-- قسم حلقات البودكاست --}}
        <div class="fi-card p-6 mb-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">حلقات بودكاست</h2>
                <button wire:click="openPodcastModal" 
                        class="fi-btn bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    إضافة حلقة جديدة
                </button>
            </div>
            
            @if($this->podcastEpisodes && $this->podcastEpisodes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($this->podcastEpisodes as $episode)
                    <div class="fi-card p-4 border border-indigo-200">
                        <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $episode->title }}</h4>
                        <p class="text-gray-700 text-sm mb-4">{{ Str::limit($episode->description, 100) }}</p>
                        <div class="text-sm text-indigo-600 font-medium">{{ $episode->duration }} دقيقة</div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-600">
                    <p>لا توجد حلقات بودكاست متاحة حالياً</p>
                </div>
            @endif
        </div>
    </div>

    {{-- المودالات --}}
    @if($showExpertAdviceModal)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="fi-card w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ $editingExpertAdvice ? 'تعديل نصيحة الخبير' : 'إضافة نصيحة خبير جديدة' }}
                        </h3>
                        <button wire:click="closeExpertAdviceModal" class="text-gray-500 hover:text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <form wire:submit.prevent="saveExpertAdvice" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">اسم الخبير</label>
                            <input type="text" wire:model="expertAdviceForm.expert_name" 
                                   class="fi-input w-full">
                            @error('expertAdviceForm.expert_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المسمى الوظيفي</label>
                            <input type="text" wire:model="expertAdviceForm.expert_title" 
                                   class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">عنوان النصيحة</label>
                            <input type="text" wire:model="expertAdviceForm.title" 
                                   class="fi-input w-full">
                            @error('expertAdviceForm.title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المحتوى</label>
                            <textarea wire:model="expertAdviceForm.content" rows="3" 
                                      class="fi-input w-full"></textarea>
                            @error('expertAdviceForm.content') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">رابط الفيديو (اختياري)</label>
                            <input type="url" wire:model="expertAdviceForm.video_url" 
                                   class="fi-input w-full">
                        </div>
                        <div class="flex justify-end gap-3">
                            <button type="button" wire:click="closeExpertAdviceModal" 
                                    class="fi-btn bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">إلغاء</button>
                            <button type="submit" 
                                    class="fi-btn bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">
                                {{ $editingExpertAdvice ? 'تحديث' : 'حفظ' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if($showGrandmaAdviceModal)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="fi-card w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ $editingGrandmaAdvice ? 'تعديل نصيحة الجدة' : 'إضافة نصيحة جدة جديدة' }}
                        </h3>
                        <button wire:click="closeGrandmaAdviceModal" class="text-gray-500 hover:text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <form wire:submit.prevent="saveGrandmaAdvice" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">اسم الجدة</label>
                            <input type="text" wire:model="grandmaAdviceForm.grandma_name" 
                                   class="fi-input w-full">
                            @error('grandmaAdviceForm.grandma_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المنطقة</label>
                            <input type="text" wire:model="grandmaAdviceForm.region" 
                                   class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">عنوان النصيحة</label>
                            <input type="text" wire:model="grandmaAdviceForm.title" 
                                   class="fi-input w-full">
                            @error('grandmaAdviceForm.title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المحتوى</label>
                            <textarea wire:model="grandmaAdviceForm.content" rows="3" 
                                      class="fi-input w-full"></textarea>
                            @error('grandmaAdviceForm.content') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">الفئة</label>
                            <select wire:model="grandmaAdviceForm.category" 
                                    class="fi-input w-full">
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
                                    class="fi-btn bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">إلغاء</button>
                            <button type="submit" 
                                    class="fi-btn bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
                                {{ $editingGrandmaAdvice ? 'تحديث' : 'حفظ' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if($showPodcastModal)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="fi-card w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ $editingPodcast ? 'تعديل حلقة البودكاست' : 'إضافة حلقة بودكاست جديدة' }}
                        </h3>
                        <button wire:click="closePodcastModal" class="text-gray-500 hover:text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <form wire:submit.prevent="savePodcast" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">عنوان الحلقة</label>
                            <input type="text" wire:model="podcastForm.title" 
                                   class="fi-input w-full">
                            @error('podcastForm.title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                            <textarea wire:model="podcastForm.description" rows="3" 
                                      class="fi-input w-full"></textarea>
                            @error('podcastForm.description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">رابط الصوت</label>
                            <input type="url" wire:model="podcastForm.audio_url" 
                                   class="fi-input w-full">
                            @error('podcastForm.audio_url') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المدة (بالدقائق)</label>
                            <input type="number" wire:model="podcastForm.duration" 
                                   class="fi-input w-full">
                        </div>
                        <div class="flex justify-end gap-3">
                            <button type="button" wire:click="closePodcastModal" 
                                    class="fi-btn bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">إلغاء</button>
                            <button type="submit" 
                                    class="fi-btn bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                                {{ $editingPodcast ? 'تحديث' : 'حفظ' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</x-filament::page>
