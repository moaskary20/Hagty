<x-filament::page>
    <div class="space-y-6">
        {{-- عنوان الصفحة --}}
        <div class="fi-card p-6 mb-6">
            <h3 class="text-lg font-bold">كيف تكونين أمًا</h3>
            <p class="text-sm text-gray-600 mt-2">دليلكِ الشامل للأمومة الحديثة والصحيحة</p>
        </div>

        {{-- قسم نصائح الخبراء --}}
        <div class="fi-card p-6 mb-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">نصائح الخبراء</h2>
                <button wire:click="openExpertAdviceModal" 
                        class="fi-btn bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700">
                    إضافة نصيحة جديدة
                </button>
            </div>
            
            @if($this->expertAdvices && $this->expertAdvices->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($this->expertAdvices as $advice)
                    <div class="fi-card p-6 border border-pink-200">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                @if($advice->expert_image)
                                    <img src="{{ Storage::url($advice->expert_image) }}" alt="{{ $advice->expert_name }}" 
                                         class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-lg">{{ substr($advice->expert_name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $advice->expert_name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $advice->expert_title }}</p>
                                </div>
                            </div>
                            <button wire:click="editExpertAdvice({{ $advice->id }})" 
                                    class="text-gray-500 hover:text-pink-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                        </div>
                        <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 text-sm leading-relaxed">{{ Str::limit($advice->content, 150) }}</p>
                        @if($advice->video_url)
                            <div class="mt-4">
                                <a href="{{ $advice->video_url }}" target="_blank" 
                                   class="inline-flex items-center gap-2 text-pink-600 hover:text-pink-700 text-sm font-medium">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 6a2 2 0 012-2h6l2 2h6a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                    </svg>
                                    مشاهدة الفيديو
                                </a>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-gray-600 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500">لا توجد نصائح خبراء متاحة حالياً</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Grandma Advice Section --}}
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
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($this->grandmaAdvices as $advice)
                    <div class="fi-card p-6 border border-amber-200">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $advice->grandma_name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $advice->region }}</p>
                                </div>
                            </div>
                            <button wire:click="editGrandmaAdvice({{ $advice->id }})" 
                                    class="text-gray-500 hover:text-amber-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                        </div>
                        <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 text-sm leading-relaxed">{{ Str::limit($advice->content, 150) }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-xs text-amber-600 text-amber-600 font-medium">{{ $advice->category }}</span>
                            <span class="text-xs text-gray-500">{{ $advice->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-gray-600 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500">لا توجد نصائح من الجدات متاحة حالياً</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Podcast Episodes Section --}}
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
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($this->podcastEpisodes as $episode)
                    <div class="fi-card p-6 border border-indigo-200">
                        <div class="flex justify-between items-start mb-4">
                            @if($episode->cover_image)
                                <img src="{{ Storage::url($episode->cover_image) }}" alt="{{ $episode->title }}" 
                                     class="w-16 h-16 rounded-lg object-cover">
                            @else
                                <div class="w-16 h-16 bg-indigo-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM15.657 6.343a1 1 0 011.414 1.414L15.414 9.414a1 1 0 11-1.414-1.414l1.657-1.657zm2.828 0a1 1 0 011.414 1.414l-4.95 4.95a1 1 0 01-1.414-1.414l4.95-4.95z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                            <button wire:click="editPodcast({{ $episode->id }})" 
                                    class="text-gray-500 hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                        </div>
                        <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $episode->title }}</h4>
                        <p class="text-gray-700 text-sm leading-relaxed mb-4">{{ Str::limit($episode->description, 100) }}</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-sm text-indigo-600 text-indigo-600 font-medium">{{ $episode->duration }} دقيقة</span>
                            <span class="text-xs text-gray-500">{{ $episode->created_at->diffForHumans() }}</span>
                        </div>
                        @if($episode->audio_url)
                            <a href="{{ $episode->audio_url }}" target="_blank" 
                               class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-center py-2 px-4 rounded-lg inline-flex items-center justify-center gap-2 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                </svg>
                                استمع الآن
                            </a>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-gray-600 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500">لا توجد حلقات بودكاست متاحة حالياً</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Modals --}}
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
                            @error('expertAdviceForm.expert_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                            @error('expertAdviceForm.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المحتوى</label>
                            <textarea wire:model="expertAdviceForm.content" rows="4" 
                                      class="fi-input w-full"></textarea>
                            @error('expertAdviceForm.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">رابط الفيديو (اختياري)</label>
                            <input type="url" wire:model="expertAdviceForm.video_url" 
                                   class="fi-input w-full">
                        </div>
                        <div class="flex justify-end gap-3 pt-4">
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
                            @error('grandmaAdviceForm.grandma_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                            @error('grandmaAdviceForm.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المحتوى</label>
                            <textarea wire:model="grandmaAdviceForm.content" rows="4" 
                                      class="fi-input w-full"></textarea>
                            @error('grandmaAdviceForm.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                        <div class="flex justify-end gap-3 pt-4">
                            <button type="button" wire:click="closeGrandmaAdviceModal" 
                                    class="px-4 py-2 text-gray-700 hover:text-gray-800">إلغاء</button>
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
                            @error('podcastForm.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                            <textarea wire:model="podcastForm.description" rows="3" 
                                      class="fi-input w-full"></textarea>
                            @error('podcastForm.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">رابط الصوت</label>
                            <input type="url" wire:model="podcastForm.audio_url" 
                                   class="fi-input w-full">
                            @error('podcastForm.audio_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المدة (بالدقائق)</label>
                            <input type="number" wire:model="podcastForm.duration" 
                                   class="fi-input w-full">
                        </div>
                        <div class="flex justify-end gap-3 pt-4">
                            <button type="button" wire:click="closePodcastModal" 
                                    class="px-4 py-2 text-gray-700 hover:text-gray-800">إلغاء</button>
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

    {{-- Custom Styles --}}
    <style>
        
        /* RTL Support */
        [dir="rtl"] .space-y-6 > * + * {
            margin-right: 0;
        }
        
        /* Custom scrollbar for modals */
        .max-h-\[90vh\]::-webkit-scrollbar {
            width: 6px;
        }
        
        .max-h-\[90vh\]::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        
        .max-h-\[90vh\]::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }
        
        .max-h-\[90vh\]::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
        
        /* Animation for modals */
        .fixed.inset-0 {
            animation: fadeIn 0.3s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        /* Hover effects */
        .transition-colors {
            transition: color 0.2s ease, background-color 0.2s ease;
        }
        
        /* Focus styles */
        input:focus, textarea:focus, select:focus {
            ring: 2px;
            ring-color: #ec4899;
            border-color: #ec4899;
        }
    </style>

    {{-- JavaScript for enhanced interactions --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Close modal when clicking outside
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('fixed') && event.target.classList.contains('inset-0')) {
                    // Find if any modal is open and close it
                    if (window.Livewire) {
                        const component = window.Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id'));
                        if (component) {
                            if (component.get('showExpertAdviceModal')) {
                                component.call('closeExpertAdviceModal');
                            }
                            if (component.get('showGrandmaAdviceModal')) {
                                component.call('closeGrandmaAdviceModal');
                            }
                            if (component.get('showPodcastModal')) {
                                component.call('closePodcastModal');
                            }
                        }
                    }
                }
            });

            // Escape key to close modals
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    if (window.Livewire) {
                        const component = window.Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id'));
                        if (component) {
                            if (component.get('showExpertAdviceModal')) {
                                component.call('closeExpertAdviceModal');
                            }
                            if (component.get('showGrandmaAdviceModal')) {
                                component.call('closeGrandmaAdviceModal');
                            }
                            if (component.get('showPodcastModal')) {
                                component.call('closePodcastModal');
                            }
                        }
                    }
                }
            });

            // Smooth scroll for better UX
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</x-filament::page>
