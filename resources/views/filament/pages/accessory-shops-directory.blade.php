@php
// سيتم تمرير البيانات من الصفحة عبر متغيرات $shops, $bannerAds, $sponsorVideo, $fashionTrends, $trainingVideos, $forasyCourses
@endphp

<div class="filament-accessory-directory bg-gray-900 text-white p-6 rounded-lg">
    <ul class="flex border-b border-gray-700 mb-6">
        <li class="-mb-px mr-1">
            <a class="tab-link inline-block py-2 px-4 font-semibold hover:text-yellow-400 active" href="#shops-tab">قائمة المتاجر</a>
        </li>
        <li class="-mb-px mr-1">
            <a class="tab-link inline-block py-2 px-4 font-semibold hover:text-yellow-400" href="#trends-tab">صيحات الموضة</a>
        </li>
        <li class="-mb-px mr-1">
            <a class="tab-link inline-block py-2 px-4 font-semibold hover:text-yellow-400" href="#achieve-tab">يمكنك تحقيق ذلك</a>
        </li>
    </ul>
    <div id="shops-tab" class="tab-content">
    </div>
    <div id="trends-tab" class="tab-content hidden">
        @include('filament.pages.partials.fashion-trends', [
            'fashionTrends' => $fashionTrends
        ])
    </div>
    <div id="achieve-tab" class="tab-content hidden">
        @include('filament.pages.partials.achieve-section', [
            'trainingVideos' => $trainingVideos,
            'forasyCourses' => $forasyCourses
        ])
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.tab-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.tab-link').forEach(l => l.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
            link.classList.add('active');
            document.querySelector(link.getAttribute('href')).classList.remove('hidden');
        });
    });
</script>
@endpush
