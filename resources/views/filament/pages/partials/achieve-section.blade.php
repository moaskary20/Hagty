<div class="mb-6">
    <h2 class="text-xl font-bold mb-4">مكتبة الفيديوهات التدريبية المجانية</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        @foreach($trainingVideos as $video)
        <div class="bg-gray-800 rounded-lg p-4 shadow">
            <h3 class="text-lg font-semibold text-pink-400 mb-2">{{ $video->title }}</h3>
            <video src="{{ asset('storage/' . $video->video_url) }}" controls class="w-full rounded"></video>
            <p class="mt-2">{{ $video->description }}</p>
        </div>
        @endforeach
    </div>
    <h2 class="text-xl font-bold mb-4">دورات Forasy</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($forasyCourses as $course)
        <div class="bg-gray-800 rounded-lg p-4 shadow">
            <h3 class="text-lg font-semibold text-pink-400 mb-2">{{ $course->title }}</h3>
            <p class="mb-2">{{ $course->description }}</p>
            <a href="{{ $course->booking_url }}" target="_blank" class="inline-block bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">احجز الآن</a>
        </div>
        @endforeach
    </div>
</div>
