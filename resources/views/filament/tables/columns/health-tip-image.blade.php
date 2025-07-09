@php
    $record = $getRecord();
@endphp

<div class="flex items-center justify-center">
    @if($record->image)
        <img src="{{ $record->image_url }}" 
             alt="{{ $record->title }}"
             class="w-12 h-12 rounded-lg object-cover border-2 border-pink-500">
    @else
        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-pink-100 to-pink-200 flex items-center justify-center border-2 border-pink-500">
            @if($record->content_type === 'youtube_link')
                <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a2.936 2.936 0 0 0-2.071-2.073C19.505 3.546 12 3.546 12 3.546s-7.505 0-9.427.567A2.936 2.936 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a2.936 2.936 0 0 0 2.071 2.073c1.922.567 9.427.567 9.427.567s7.505 0 9.427-.567a2.936 2.936 0 0 0 2.071-2.073C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            @elseif($record->content_type === 'video')
                <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            @else
                <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            @endif
        </div>
    @endif
</div>
