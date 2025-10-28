<div class="fi-card p-6">
    @if($success)
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mb-4">{{ $offer_id ? 'تم تعديل العرض بنجاح!' : 'تم إضافة العرض بنجاح!' }}</div>
    @endif
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">الوجهة:</label>
            <input type="text" wire:model="destination" class="fi-input w-full" required>
            @error('destination') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">التاريخ:</label>
            <input type="date" wire:model="date" class="fi-input w-full" required>
            @error('date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">عنوان العرض:</label>
            <input type="text" wire:model="title" class="fi-input w-full" required>
            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">وصف العرض:</label>
            <textarea wire:model="description" class="fi-input w-full" rows="2"></textarea>
            @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">رابط صورة:</label>
            <input type="text" wire:model="image" class="fi-input w-full">
            @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">رابط فيديو:</label>
            <input type="text" wire:model="video" class="fi-input w-full">
            @error('video') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">السعر:</label>
            <input type="number" wire:model="price" class="fi-input w-full">
            @error('price') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" wire:model="active" class="fi-checkbox">
            <label class="block text-sm font-medium text-gray-700">نشط</label>
        </div>
        <button type="submit" class="fi-btn bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">{{ $offer_id ? 'تعديل العرض' : 'حفظ العرض' }}</button>
    </form>
</div>
