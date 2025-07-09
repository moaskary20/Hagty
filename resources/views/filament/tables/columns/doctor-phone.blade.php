@php
    $record = $getRecord();
    $phones = $record->phone;
    
    if (is_array($phones) && !empty($phones)) {
        $phoneNumbers = array_column($phones, 'number');
        $phoneNumbers = array_filter($phoneNumbers);
    } elseif (is_string($phones)) {
        $decoded = json_decode($phones, true);
        if (is_array($decoded) && !empty($decoded)) {
            $phoneNumbers = array_column($decoded, 'number');
            $phoneNumbers = array_filter($phoneNumbers);
        } else {
            $phoneNumbers = [];
        }
    } else {
        $phoneNumbers = [];
    }
@endphp

<div class="flex flex-wrap gap-1 justify-center">
    @if(!empty($phoneNumbers))
        @foreach($phoneNumbers as $phone)
            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-green-600 rounded-md hover:bg-green-700 cursor-pointer"
                  style="
                    background-color: #22c55e !important;
                    color: white !important;
                    font-family: 'Tajawal', Arial, sans-serif !important;
                    font-size: 12px !important;
                    font-weight: 600 !important;
                    padding: 4px 8px !important;
                    border-radius: 4px !important;
                    direction: ltr !important;
                    margin: 2px !important;
                    border: 1px solid #16a34a !important;
                  "
                  onclick="navigator.clipboard.writeText('{{ $phone }}'); alert('تم نسخ الرقم: {{ $phone }}');"
                  title="اضغط لنسخ الرقم">
                {{ $phone }}
            </span>
        @endforeach
    @else
        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-400 bg-gray-100 rounded-md"
              style="
                background-color: #666666 !important;
                color: white !important;
                font-family: 'Tajawal', Arial, sans-serif !important;
                font-size: 12px !important;
                padding: 4px 8px !important;
                border-radius: 4px !important;
              ">
            لا يوجد رقم
        </span>
    @endif
</div>
