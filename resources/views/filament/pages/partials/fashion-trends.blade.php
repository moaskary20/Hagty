<div class="mb-6">
    <h2 class="text-xl font-bold mb-4">نصائح وصيحات الموضة والإكسسوارات</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($fashionTrends as $trend)
        <div class="bg-gray-800 rounded-lg p-4 shadow">
            <h3 class="text-lg font-semibold text-pink-400 mb-2">{{ $trend->title }}</h3>
            <p class="mb-2">{{ $trend->description }}</p>
            @if($trend->video_url)
                <video src="{{ asset('storage/' . $trend->video_url) }}" controls class="w-full rounded"></video>
            @endif
        </div>
        @endforeach
    </div>
    <!-- مدونات الأناقة: يمكن توسيعها لاحقاً لمواضيع وفيديوهات وأقسام -->
    <div class="mt-8">
        <h3 class="text-lg font-bold mb-2">مدونات الأناقة</h3>
        <p class="text-gray-300">تابع أحدث المواضيع والفيديوهات في عالم الأناقة والإكسسوارات.</p>
        <!-- يمكن إضافة أقسام ومواضيع وفيديوهات هنا لاحقاً -->
    </div>
</div>
