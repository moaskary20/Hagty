<form wire:submit.prevent="save" class="flex flex-col gap-4">
    <input type="text" wire:model.defer="name" placeholder="اسم البازار" class="rounded-lg border-gray-300 px-4 py-2" required>
    <textarea wire:model.defer="info" placeholder="معلومات البازار" class="rounded-lg border-gray-300 px-4 py-2"></textarea>
    <div class="flex gap-2">
        <input type="date" wire:model.defer="start_date" class="rounded-lg border-gray-300 px-4 py-2" required>
        <input type="date" wire:model.defer="end_date" class="rounded-lg border-gray-300 px-4 py-2" required>
    </div>
    <input type="text" wire:model.defer="city" placeholder="المدينة" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="text" wire:model.defer="location" placeholder="الموقع (اختياري)" class="rounded-lg border-gray-300 px-4 py-2">
    <input type="url" wire:model.defer="map_url" placeholder="رابط خرائط Google (اختياري)" class="rounded-lg border-gray-300 px-4 py-2">
    <input type="text" wire:model.defer="promo" placeholder="العروض الترويجية (اختياري)" class="rounded-lg border-gray-300 px-4 py-2">
    <input type="text" wire:model.defer="discounts" placeholder="الخصومات (اختياري)" class="rounded-lg border-gray-300 px-4 py-2">
    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-lg mt-2">حفظ</button>
</form>
