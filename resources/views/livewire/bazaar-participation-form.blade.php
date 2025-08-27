<form wire:submit.prevent="save" class="flex flex-col gap-4">
    <input type="text" wire:model.defer="name" placeholder="اسم المشارك" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="text" wire:model.defer="activity_type" placeholder="نوع النشاط" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="text" wire:model.defer="phone" placeholder="رقم الهاتف" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="email" wire:model.defer="email" placeholder="البريد الإلكتروني" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="text" wire:model.defer="city" placeholder="المدينة" class="rounded-lg border-gray-300 px-4 py-2" required>
    <textarea wire:model.defer="description" placeholder="وصف النشاط/المنتج (اختياري)" class="rounded-lg border-gray-300 px-4 py-2"></textarea>
    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-lg mt-2">حفظ</button>
</form>
