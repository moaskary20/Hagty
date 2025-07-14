<div class="min-h-screen bg-gradient-to-br from-pink-50 to-purple-50 p-6" dir="rtl">
    {{-- Header --}}
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">النصائح العائلية</h1>
        <p class="mt-2 text-pink-100">نصائح وإرشادات من الخبراء لحياة عائلية أفضل</p>
    </div>

    {{-- Success/Error Messages --}}
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Add New Advice Button --}}
    <div class="mb-6">
        <button wire:click="showAdviceModal" 
                class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إضافة نصيحة جديدة
        </button>
    </div>

    {{-- Advice Modal --}}
    @if($showAdviceModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="custom-modal">
                <h2 class="custom-modal-header">إضافة نصيحة جديدة</h2>
                <form wire:submit.prevent="saveAdvice">
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">عنوان النصيحة</label>
                        <input type="text" wire:model.defer="adviceForm.title" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">نوع النصيحة</label>
                        <input type="text" wire:model.defer="adviceForm.type" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">محتوى النصيحة</label>
                        <textarea wire:model.defer="adviceForm.content" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">اسم الخبير (اختياري)</label>
                        <input type="text" wire:model.defer="adviceForm.expert_name" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">الفئة المستهدفة</label>
                        <input type="text" wire:model.defer="adviceForm.target_audience" class="w-full border rounded px-3 py-2">
                    </div>
                    <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded w-full font-bold">حفظ النصيحة</button>
                    <button type="button" wire:click="closeAdviceModal" class="mt-2 bg-gray-300 text-gray-700 px-4 py-2 rounded w-full">إغلاق</button>
                </form>
            </div>
        </div>
    @endif

    {{-- باقي محتوى النصائح العائلية هنا ... --}}
</div>
