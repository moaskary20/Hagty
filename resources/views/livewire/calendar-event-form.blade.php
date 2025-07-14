<form wire:submit.prevent="save" class="space-y-4">
    <div>
        <label class="block mb-1 text-white">اسم الفعالية</label>
        <input type="text" wire:model.defer="name" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="مثال: رحلة إلى شرم الشيخ">
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block mb-1 text-white">تاريخ الفعالية</label>
        <input type="date" wire:model.defer="date" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
        @error('date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block mb-1 text-white">الوجهة</label>
        <input type="text" wire:model.defer="destination" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="مثال: شرم الشيخ">
        @error('destination') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block mb-1 text-white">الحالة</label>
        <select wire:model.defer="status" class="w-full rounded-lg px-4 py-2 bg-pink-50 text-pink-900 focus:outline-none focus:ring-2 focus:ring-pink-400">
            <option value="">اختر الحالة</option>
            <option value="محجوزة">محجوزة</option>
            <option value="مخطط لها">مخطط لها</option>
            <option value="مكتملة">مكتملة</option>
        </select>
        @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded-lg shadow">حفظ</button>
    </div>
</form>
