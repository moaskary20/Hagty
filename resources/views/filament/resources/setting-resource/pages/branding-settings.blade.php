<x-filament-panels::page>
    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}
        
        <x-filament-panels::form.actions
            :actions="$this->getFormActions()"
        />
    </x-filament-panels::form>
    
    <div class="mt-8">
        <x-filament::card>
            <div class="text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    معاينة اللوجو الحالي
                </h3>
                
                @if($logo = \App\Models\Setting::get('site_logo'))
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset($logo) }}" 
                             alt="لوجو الموقع" 
                             class="max-h-32 max-w-64 object-contain">
                    </div>
                @else
                    <div class="flex justify-center mb-4">
                        <div class="flex items-center justify-center w-32 h-32 bg-gray-100 dark:bg-gray-800 rounded-lg">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400">لا يوجد لوجو مرفوع</p>
                @endif
                
                <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div class="text-center">
                        <span class="text-sm text-gray-600 dark:text-gray-400">
                            آخر تحديث: {{ \App\Models\Setting::where('key', 'site_logo')->value('updated_at')?->format('d/m/Y H:i') ?? 'غير محدد' }}
                        </span>
                    </div>
                </div>
            </div>
        </x-filament::card>
    </div>
</x-filament-panels::page>
