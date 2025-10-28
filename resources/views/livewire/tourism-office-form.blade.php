<div>
    @if($success)
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mb-4">{{ $office_id ? 'تم تعديل بيانات المكتب بنجاح!' : 'تم إضافة المكتب بنجاح!' }}</div>
    @endif
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">العلامة التجارية:</label>
            <input type="text" wire:model="brand" class="fi-input w-full" required>
            @error('brand') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">العنوان:</label>
            <input type="text" wire:model="address" class="fi-input w-full" required>
            @error('address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف:</label>
            <input type="text" wire:model="phone" class="fi-input w-full" required>
            @error('phone') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">رابط الصفحة:</label>
            <input type="url" wire:model="page_url" class="fi-input w-full">
            @error('page_url') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="fi-btn bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">{{ $office_id ? 'تعديل المكتب' : 'حفظ المكتب' }}</button>
    </form>
</div>
