@php
    $emergencyNumbers = $getRecord()->emergency_numbers ?? [];
@endphp

<div class="flex flex-wrap gap-1 justify-center" style="direction: ltr;">
    @if(is_array($emergencyNumbers) && count($emergencyNumbers) > 0)
        @foreach($emergencyNumbers as $emergency)
            @if(isset($emergency['number']))
                <span class="fi-badge fi-badge-color-danger inline-flex items-center gap-x-1 rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset"
                      style="background-color: #dc2626; color: white; cursor: copy; font-family: 'Tajawal', Arial, sans-serif; font-weight: 600; direction: ltr; unicode-bidi: bidi-override;"
                      title="{{ $emergency['description'] ?? 'رقم طوارئ' }} - اضغط للنسخ"
                      onclick="navigator.clipboard.writeText('{{ $emergency['number'] }}').then(() => {
                          const toast = document.createElement('div');
                          toast.textContent = 'تم نسخ رقم الطوارئ!';
                          toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg z-50';
                          document.body.appendChild(toast);
                          setTimeout(() => toast.remove(), 2000);
                      })">
                    🚨 {{ $emergency['number'] }}
                </span>
            @endif
        @endforeach
    @else
        <span class="fi-badge fi-badge-color-gray inline-flex items-center gap-x-1 rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset"
              style="background-color: #6b7280; color: white; font-family: 'Tajawal', Arial, sans-serif;">
            غير متوفر
        </span>
    @endif
</div>
