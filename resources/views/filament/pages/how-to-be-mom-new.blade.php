<x-filament-panels::page>
    <div class="space-y-8">
        {{-- عنوان الصفحة --}}
        <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg p-6">
            <h1 class="text-3xl font-bold">كيف تكونين أمًا</h1>
            <p class="mt-2 text-pink-100">دليلكِ الشامل للأمومة الحديثة والصحيحة</p>
        </div>

        {{-- قسم نصائح الخبراء --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">نصائح الخبراء</h2>
                <button wire:click="openExpertAdviceModal" 
                        class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg">
                    إضافة نصيحة جديدة
                </button>
            </div>
            
            @if($this->expertAdvices && $this->expertAdvices->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($this->expertAdvices as $advice)
                    <div class="bg-pink-50 dark:bg-gray-700 rounded-lg p-4 border border-pink-200 dark:border-gray-600">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">{{ substr($advice->expert_name, 0, 1) }}</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">{{ $advice->expert_name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $advice->expert_title }}</p>
                            </div>
                        </div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ Str::limit($advice->content, 150) }}</p>
                        @if($advice->video_url)
                            <div class="mt-3">
                                <a href="{{ $advice->video_url }}" target="_blank" 
                                   class="text-pink-600 hover:text-pink-700 text-sm font-medium">
                                    🎥 مشاهدة الفيديو
                                </a>
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <p>لا توجد نصائح خبراء متاحة حالياً</p>
                </div>
            @endif
        </div>

        {{-- قسم نصائح الجدات --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">استمعي لجدتك</h2>
                <button wire:click="openGrandmaAdviceModal" 
                        class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">
                    إضافة نصيحة جديدة
                </button>
            </div>
            
            @if($this->grandmaAdvices && $this->grandmaAdvices->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($this->grandmaAdvices as $advice)
                    <div class="bg-amber-50 dark:bg-gray-700 rounded-lg p-4 border border-amber-200 dark:border-gray-600">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-amber-500 rounded-full flex items-center justify-center">
                                <span class="text-white">👵</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">{{ $advice->grandma_name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $advice->region }}</p>
                            </div>
                        </div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ Str::limit($advice->content, 150) }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-xs text-amber-600 dark:text-amber-400 font-medium">{{ $advice->category }}</span>
                            <span class="text-xs text-gray-500">{{ $advice->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <p>لا توجد نصائح من الجدات متاحة حالياً</p>
                </div>
            @endif
        </div>

        {{-- قسم حلقات البودكاست --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">حلقات بودكاست</h2>
                <button wire:click="openPodcastModal" 
                        class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    إضافة حلقة جديدة
                </button>
            </div>
            
            @if($this->podcastEpisodes && $this->podcastEpisodes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($this->podcastEpisodes as $episode)
                    <div class="bg-indigo-50 dark:bg-gray-700 rounded-lg p-4 border border-indigo-200 dark:border-gray-600">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center">
                                <span class="text-white text-xl">🎧</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-gray-900 dark:text-white">{{ $episode->title }}</h4>
                                <p class="text-sm text-indigo-600 dark:text-indigo-400">{{ $episode->duration }} دقيقة</p>
                            </div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">{{ Str::limit($episode->description, 100) }}</p>
                        @if($episode->audio_url)
                            <a href="{{ $episode->audio_url }}" target="_blank" 
                               class="w-full bg-indigo-500 hover:bg-indigo-600 text-white text-center py-2 px-4 rounded-lg inline-block">
                                🎵 استمع الآن
                            </a>
                        @endif
                        <div class="mt-2 text-xs text-gray-500">{{ $episode->created_at->diffForHumans() }}</div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <p>لا توجد حلقات بودكاست متاحة حالياً</p>
                </div>
            @endif
        </div>
    </div>
</x-filament-panels::page>
