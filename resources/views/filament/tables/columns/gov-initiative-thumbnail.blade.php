@php
    $record = $getRecord();
    $thumbnailUrl = $record->thumbnail_url;
@endphp

<div class="flex items-center justify-center">
    <img 
        src="{{ $thumbnailUrl }}" 
        alt="صورة المبادرة: {{ $record->title }}"
        class="w-12 h-12 rounded-lg object-cover border-2 border-pink-500 shadow-md hover:shadow-lg transition-shadow duration-200"
        style="width: 48px; height: 48px;"
    />
</div>
