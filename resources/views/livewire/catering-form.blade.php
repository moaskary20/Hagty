<div>
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block mb-1">اسم العلامة التجارية أو الشركة <span class="text-pink-500">*</span></label>
            <input type="text" wire:model.defer="brand" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400" required>
            @error('brand') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">معلومات عن الخدمة</label>
            <textarea wire:model.defer="description" class="w-full rounded px-3 py-2 border"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">العنوان الكامل</label>
            <input type="text" wire:model.defer="address" class="w-full rounded px-3 py-2 border">
            @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">رقم الهاتف للتواصل أو الطلب</label>
            <input type="text" wire:model.defer="phone" class="w-full rounded px-3 py-2 border">
            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">صورة الخدمة</label>
            <input type="file" wire:model="image" accept="image/*" class="w-full">
            @if($image)
                <img src="{{ $image->temporaryUrl() }}" class="w-32 h-32 object-cover rounded mt-2">
            @endif
            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">الحالة</label>
            <select wire:model.defer="status" class="w-full rounded px-3 py-2 border">
                <option value="active">نشط</option>
                <option value="inactive">غير نشط</option>
            </select>
            @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end gap-2">
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded">حفظ</button>
            <button type="button" wire:click="resetForm" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">إلغاء</button>
        </div>
    </form>
</div>
