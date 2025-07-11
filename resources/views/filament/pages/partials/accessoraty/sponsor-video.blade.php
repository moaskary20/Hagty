{{-- فيديو راعٍ (قابل للتخطي) --}}
@if($videos->count())
    <div class="mb-6">
        <div id="sponsor-video-container" class="relative">
            <video id="sponsor-video" width="100%" controls autoplay>
                <source src="{{ $videos->first()->video_url }}" type="video/mp4">
                متصفحك لا يدعم تشغيل الفيديو.
            </video>
            <button id="skip-sponsor-video" class="absolute top-2 left-2 bg-pink-600 text-white rounded px-4 py-2" style="display:none;z-index:10;">تخطي الإعلان</button>
        </div>
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var video = document.getElementById('sponsor-video');
        var skipBtn = document.getElementById('skip-sponsor-video');
        if(video && skipBtn) {
            setTimeout(function() {
                skipBtn.style.display = 'block';
            }, {{ $videos->first()->skip_after_seconds ?? 6 }} * 1000);
            skipBtn.onclick = function() {
                video.pause();
                video.currentTime = video.duration;
                skipBtn.style.display = 'none';
            };
        }
    });
</script>
