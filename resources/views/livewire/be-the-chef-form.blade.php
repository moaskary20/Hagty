<div>
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block mb-1">العنوان <span class="text-pink-500">*</span></label>
            <input type="text" wire:model.defer="title" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400" required>
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">النوع</label>
            <select wire:model.defer="type" class="w-full rounded px-3 py-2 border">
                <option value="video">فيديو تعليمي</option>
                <option value="course">دورة طبخ</option>
            </select>
            @error('type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">الوصف</label>
            <textarea wire:model.defer="description" class="w-full rounded px-3 py-2 border"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">رابط الفيديو</label>
            <input type="url" wire:model.defer="video_url" class="w-full rounded px-3 py-2 border">
            @error('video_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">صورة الدورة/الفيديو</label>
            <input type="file" wire:model="image" accept="image/*" class="w-full">
            @if($image)
                <img src="{{ $image->temporaryUrl() }}" class="w-32 h-32 object-cover rounded mt-2">
            @endif
            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">نوع الدورة</label>
            <div class="flex items-center gap-2">
                <input type="checkbox" wire:model.defer="is_online" id="is_online" class="form-checkbox">
                <label for="is_online">دورة أونلاين</label>
            </div>
            @error('is_online') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">نصائح الشيف</label>
            <div class="space-y-2">
                @foreach($tips as $i => $tip)
                    <div class="flex gap-2 items-center">
                        <input type="text" wire:model.defer="tips.{{ $i }}" class="flex-1 rounded px-3 py-2 border" placeholder="نصيحة...">
                        <button type="button" wire:click="{{ '$emit' }}('removeTip', {{ $i }})" class="text-red-500">حذف</button>
                    </div>
                @endforeach
                <button type="button" wire:click="$set('tips', [...$tips, ''])" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded">إضافة نصيحة</button>
            </div>
            @error('tips') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
