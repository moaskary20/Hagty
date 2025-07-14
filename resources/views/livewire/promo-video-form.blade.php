<div>
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block mb-1">عنوان الفيديو <span class="text-pink-500">*</span></label>
            <input type="text" wire:model.defer="title" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400" required>
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">رابط الفيديو <span class="text-pink-500">*</span></label>
            <input type="url" wire:model.defer="video_url" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400" required>
            @error('video_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">الوصف</label>
            <textarea wire:model.defer="description" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">الحالة</label>
            <select wire:model.defer="status" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400">
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
