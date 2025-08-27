@php
    $thumbnailUrl = $getRecord()->thumbnail_url;
    $title = $getRecord()->title;
    $alertLevel = $getRecord()->alert_level;
    $alertLevelArabic = $getRecord()->alert_level_arabic;
    
    // تحديد اللون حسب مستوى التنبيه
    $borderColor = match($alertLevel) {
        'low' => '#10b981',
        'medium' => '#f59e0b',
        'high' => '#ef4444',
        'critical' => '#dc2626',
        default => '#6b7280'
    };
@endphp

<div class="flex items-center justify-center" style="direction: rtl;">
    <div class="relative group">
        <img 
            src="{{ $thumbnailUrl }}" 
            alt="{{ $title }}"
            class="w-12 h-12 rounded-full object-cover border-2 transition-transform duration-200 hover:scale-110"
            style="border-color: {{ $borderColor }};"
        >
        
        <!-- مؤشر مستوى التنبيه -->
        <div class="absolute -top-1 -right-1 w-4 h-4 rounded-full border-2 border-white flex items-center justify-center text-white text-xs font-bold"
             style="background-color: {{ $borderColor }};">
            @if($alertLevel === 'low')
                ℹ️
            @elseif($alertLevel === 'medium')
                ⚠️
            @elseif($alertLevel === 'high')
                🚨
            @elseif($alertLevel === 'critical')
                🆘
            @endif
        </div>
        
        <!-- Tooltip عند الـ hover -->
        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-10">
            {{ $title }}
            <br>
            <span class="text-xs" style="color: {{ $borderColor }};">{{ $alertLevelArabic }}</span>
        </div>
    </div>
</div>
