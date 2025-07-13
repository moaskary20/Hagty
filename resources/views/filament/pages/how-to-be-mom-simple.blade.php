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
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $advice->content }}</p>
                        <p class="text-sm text-pink-600 mt-2">{{ $advice->expert_name }}</p>
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
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">{{ $advice->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $advice->content }}</p>
                        <p class="text-sm text-amber-600 mt-2">{{ $advice->grandma_name }} - {{ $advice->region }}</p>
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
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">{{ $episode->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">{{ $episode->description }}</p>
                        @if($episode->audio_url)
                            <a href="{{ $episode->audio_url }}" target="_blank" 
                               class="w-full bg-indigo-500 hover:bg-indigo-600 text-white text-center py-2 px-4 rounded-lg inline-block">
                                🎵 استمع الآن
                            </a>
                        @endif
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
