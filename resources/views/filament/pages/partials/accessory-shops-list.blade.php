<div class="mb-6">
    <!-- Carousel إعلانات بانر -->
    <div id="banner-carousel" class="relative w-full mb-4">
        <div class="overflow-hidden rounded-lg shadow-lg">
            @foreach($bannerAds as $index => $ad)
                <img src="{{ asset('storage/' . $ad->image) }}" alt="إعلان بانر" class="carousel-img w-full h-48 object-cover @if($index !== 0) hidden @endif" data-carousel-index="{{ $index }}">
            @endforeach
        </div>
        @if(count($bannerAds) > 1)
        <div class="flex justify-center mt-2">
            @foreach($bannerAds as $index => $ad)
                <button class="w-3 h-3 mx-1 rounded-full bg-pink-300 carousel-dot @if($index === 0) bg-pink-600 @endif" data-carousel-dot="{{ $index }}"></button>
            @endforeach
        </div>
        @endif
    </div>
    <!-- فيديو راعٍ مع زر تخطي -->
    @if($sponsorVideo)
    <div class="relative mb-4">
        <video id="sponsor-video" src="{{ asset('storage/' . $sponsorVideo->video_url) }}" controls class="w-full rounded-lg"></video>
        <button id="skip-sponsor" class="absolute top-2 left-2 bg-black bg-opacity-60 text-white px-4 py-2 rounded-lg hidden">تخطي الإعلان</button>
    </div>
    @endif
    <!-- جدول المتاجر -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2">اسم العلامة التجارية</th>
                    <th class="px-4 py-2">الموقع</th>
                    <th class="px-4 py-2">رابط المتجر</th>
                    <th class="px-4 py-2">فئة التاجر</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shops as $shop)
                <tr>
                    <td class="px-4 py-2">{{ $shop->brand_name }}</td>
                    <td class="px-4 py-2">
                        <a href="https://maps.google.com/?q={{ urlencode($shop->location) }}" target="_blank" class="text-pink-400 underline">عرض على الخريطة</a>
                    </td>
                    <td class="px-4 py-2">
                        @if($shop->shop_url)
                        <a href="{{ $shop->shop_url }}" target="_blank" class="text-pink-400 underline">زيارة المتجر</a>
                        @else
                        -
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded @if($shop->category == 'ذهبية') bg-yellow-500 @elseif($shop->category == 'فضية') bg-gray-400 @else bg-pink-400 @endif text-black font-bold">{{ $shop->category }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- فلتر الفئة -->
    <div class="mt-4 flex gap-2">
        <label>فلترة حسب الفئة:</label>
        <select id="category-filter" class="text-black rounded px-2 py-1">
            <option value="">الكل</option>
            <option value="ذهبية">ذهبية</option>
            <option value="فضية">فضية</option>
            <option value="ماسية">ماسية</option>
        </select>
    </div>
</div>

@push('scripts')
<script>
// Carousel
let currentBanner = 0;
const banners = document.querySelectorAll('.carousel-img');
const dots = document.querySelectorAll('.carousel-dot');
if (banners.length > 1) {
    dots.forEach((dot, idx) => {
        dot.addEventListener('click', () => {
            banners[currentBanner].classList.add('hidden');
            dots[currentBanner].classList.remove('bg-pink-600');
            currentBanner = idx;
            banners[currentBanner].classList.remove('hidden');
            dots[currentBanner].classList.add('bg-pink-600');
        });
    });
}
// Sponsor Video Skip
const sponsorVideo = document.getElementById('sponsor-video');
const skipBtn = document.getElementById('skip-sponsor');
if (sponsorVideo && skipBtn) {
    sponsorVideo.addEventListener('play', () => {
        setTimeout(() => {
            skipBtn.classList.remove('hidden');
        }, 6000);
    });
    skipBtn.addEventListener('click', () => {
        sponsorVideo.pause();
        sponsorVideo.currentTime = sponsorVideo.duration;
        skipBtn.classList.add('hidden');
    });
}
// Category Filter
const filter = document.getElementById('category-filter');
filter && filter.addEventListener('change', function() {
    const value = this.value;
    document.querySelectorAll('tbody tr').forEach(row => {
        if (!value || row.children[3].innerText.trim() === value) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endpush
