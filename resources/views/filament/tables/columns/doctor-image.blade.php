@php
    $record = $getRecord();
    $imageUrl = $record->image_url;
    $defaultImage = asset('images/default-doctor.svg');
    $hasImage = $record->hasImage();
@endphp

<div class="flex items-center justify-center">
    @if($hasImage)
        <img 
            src="{{ $imageUrl }}" 
            alt="صورة الطبيب {{ $record->full_name }}"
            class="doctor-image"
            onerror="this.src='{{ $defaultImage }}'; this.classList.add('default-image');"
            style="
                width: 50px !important;
                height: 50px !important;
                object-fit: cover !important;
                border-radius: 50% !important;
                border: 2px solid #e91e63 !important;
                background-color: #f8f8f8 !important;
                display: block !important;
            "
        >
    @else
        <div 
            class="doctor-image-placeholder"
            style="
                width: 50px !important;
                height: 50px !important;
                border-radius: 50% !important;
                border: 2px solid #e91e63 !important;
                background-image: url('{{ $defaultImage }}') !important;
                background-size: cover !important;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-color: #e91e63 !important;
            "
        ></div>
    @endif
</div>
