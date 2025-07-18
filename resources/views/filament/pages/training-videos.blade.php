{{-- مكتبة الفيديوهات التدريبية المجانية --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">مكتبة الفيديوهات التدريبية المجانية</h3>
        <!-- زر إضافة فيديو -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="document.getElementById('addVideoForm').style.display='block'">
                + إضافة فيديو تدريبي
            </button>
        </div>
        <!-- البحث والتصفية -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بعنوان الفيديو أو القطاع..." class="fi-input w-48">
            <select name="sector" class="fi-input w-40">
                <option value="">كل القطاعات</option>
                @foreach($sectors as $sector)
                    <option value="{{ $sector }}" {{ request('sector') == $sector ? 'selected' : '' }}>{{ $sector }}</option>
                @endforeach
            </select>
            <button type="submit" class="fi-btn bg-pink-400">بحث</button>
        </form>
        <!-- نموذج إضافة فيديو -->
        <div id="addVideoForm" style="display:none;">
            <form method="POST" action="{{ route('training-videos.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <input type="text" name="title" placeholder="عنوان الفيديو" class="fi-input" required>
                <input type="url" name="video_url" placeholder="رابط الفيديو (YouTube أو mp4)" class="fi-input" required>
                <input type="url" name="course_link" placeholder="رابط الدورة ذات الصلة (اختياري)" class="fi-input">
                <input type="text" name="sector" placeholder="القطاع/التصنيف (مثلاً: التعليم، فرصي...)" class="fi-input">
                <textarea name="description" placeholder="وصف مختصر للفيديو (اختياري)" class="fi-input"></textarea>
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الفيديو</button>
                    <button type="button" onclick="document.getElementById('addVideoForm').style.display='none'" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
        <!-- قائمة الفيديوهات -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">الفيديوهات المتاحة</h4>
            <div class="flex flex-wrap gap-4">
                @foreach($videos as $video)
                    <div class="bg-gray-800 rounded-lg p-2 flex flex-col items-center" style="width: 320px;">
                        <video src="{{ $video->video_url }}" controls style="max-width: 300px; max-height: 180px; border-radius: 6px; margin-bottom: 8px;"></video>
                        <span class="text-base text-gray-100 mb-1 font-bold">{{ $video->title }}</span>
                        @if($video->sector)
                            <span class="text-xs text-gray-400">({{ $video->sector }})</span>
                        @endif
                        @if($video->description)
                            <span class="text-xs text-gray-300 block mb-1">{{ $video->description }}</span>
                        @endif
                        @if($video->course_link)
                            <a href="{{ $video->course_link }}" target="_blank" class="text-pink-400 underline text-xs">رابط الدورة ذات الصلة</a>
                        @endif
                        <form method="POST" action="{{ route('training-videos.destroy', $video->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2 mt-2">حذف</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-filament::page>
