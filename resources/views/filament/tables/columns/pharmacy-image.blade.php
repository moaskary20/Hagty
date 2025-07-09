@php
    $imageUrl = $getRecord()->image_url ?? $getRecord()->getImageUrlAttribute();
@endphp

<div class="flex justify-center items-center">
    <img 
        src="{{ $imageUrl }}" 
        alt="{{ $getRecord()->name }}" 
        class="w-12 h-12 rounded-full object-cover border-2 border-green-500 shadow-lg"
        style="border-color: #4caf50 !important;"
    >
</div>
