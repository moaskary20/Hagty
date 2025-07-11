{{-- بانر الرعاة (سلايدر) --}}
<div class="w-full mb-6">
    <div class="swiper-container" id="accessoraty-banner-swiper">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
                <div class="swiper-slide">
                    <a href="{{ $banner->link }}" target="_blank">
                        <img src="{{ $banner->image }}" alt="إعلان راعي" class="w-full rounded-lg shadow" />
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
