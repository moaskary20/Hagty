@php
    $imageUrl = $getRecord()->image_url;
@endphp

<div class="flex justify-center items-center">
    <img src="{{ $imageUrl }}" 
         alt="صورة {{ $getRecord()->name }}"
         class="w-12 h-12 rounded-full object-cover border-2 border-pink-500 shadow-lg hover:scale-110 transition-transform duration-200"
         onerror="this.src='{{ $imageUrl }}'" />
</div>
