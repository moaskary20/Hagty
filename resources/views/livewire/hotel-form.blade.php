<form wire:submit.prevent="save" class="space-y-4">
    <div>
        <label class="block mb-1 text-white">اسم الفندق</label>
        <input type="text" wire:model.defer="name" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="مثال: فندق النيل">
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block mb-1 text-white">العلامة التجارية</label>
        <input type="text" wire:model.defer="brand" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="مثال: هيلتون">
        @error('brand') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block mb-1 text-white">الموقع</label>
        <input type="text" wire:model.defer="location" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="مثال: القاهرة">
        @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block mb-1 text-white">العروض والباقات</label>
        <textarea wire:model.defer="offers" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="مثال: خصم 20% على الإقامة"></textarea>
        @error('offers') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block mb-1 text-white">الحالة</label>
        <select wire:model.defer="status" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
            <option value="">اختر الحالة</option>
            <option value="متاح">متاح</option>
            <option value="مغلق">مغلق</option>
        </select>
        @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded-lg shadow">حفظ</button>
    </div>
</form>
