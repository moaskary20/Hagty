<form wire:submit.prevent="save" class="flex flex-col gap-4">
    <select wire:model.defer="bazaar_id" class="rounded-lg border-gray-300 px-4 py-2" required>
        <option value="">اختر البازار</option>
        @foreach($bazaars as $bazaar)
            <option value="{{ $bazaar->id }}">{{ $bazaar->name }}</option>
        @endforeach
    </select>
    <input type="text" wire:model.defer="participant_name" placeholder="اسم المشارك" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="text" wire:model.defer="project_name" placeholder="اسم المشروع (اختياري)" class="rounded-lg border-gray-300 px-4 py-2">
    <input type="text" wire:model.defer="phone" placeholder="رقم الهاتف" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="email" wire:model.defer="email" placeholder="البريد الإلكتروني (اختياري)" class="rounded-lg border-gray-300 px-4 py-2">
    <input type="text" wire:model.defer="city" placeholder="المدينة" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="text" wire:model.defer="location" placeholder="الموقع (اختياري)" class="rounded-lg border-gray-300 px-4 py-2">
    <input type="date" wire:model.defer="date" class="rounded-lg border-gray-300 px-4 py-2" required>
    <input type="number" wire:model.defer="days" min="1" placeholder="عدد الأيام" class="rounded-lg border-gray-300 px-4 py-2" required>
    <textarea wire:model.defer="notes" placeholder="ملاحظات (اختياري)" class="rounded-lg border-gray-300 px-4 py-2"></textarea>
    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-lg mt-2">حفظ</button>
</form>
