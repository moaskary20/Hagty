<div>
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block mb-1">اسم الطبق <span class="text-pink-500">*</span></label>
            <input type="text" wire:model.defer="title" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400" required>
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">الوصف</label>
            <textarea wire:model.defer="description" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">خطوات التحضير <span class="text-pink-500">*</span></label>
            <div class="space-y-2">
                @foreach($steps as $i => $step)
                    <div class="flex gap-2 items-center">
                        <input type="text" wire:model.defer="steps.{{ $i }}" class="flex-1 rounded px-3 py-2 border" placeholder="خطوة...">
                        <button type="button" wire:click="{{ '$emit' }}('removeStep', {{ $i }})" class="text-red-500">حذف</button>
                    </div>
                @endforeach
                <button type="button" wire:click="$set('steps', [...$steps, ''])" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded">إضافة خطوة</button>
            </div>
            @error('steps') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">الصورة الرئيسية</label>
            <input type="file" wire:model="main_image" accept="image/*" class="w-full">
            @if($main_image)
                <img src="{{ $main_image->temporaryUrl() }}" class="w-32 h-32 object-cover rounded mt-2">
            @endif
            @error('main_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">معرض الصور</label>
            <input type="file" wire:model="gallery" multiple accept="image/*" class="w-full">
            @if($gallery)
                <div class="flex gap-2 mt-2">
                    @foreach($gallery as $img)
                        <img src="{{ $img->temporaryUrl() }}" class="w-20 h-20 object-cover rounded">
                    @endforeach
                </div>
            @endif
            @error('gallery') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">رابط فيديو الطبخ</label>
            <input type="url" wire:model.defer="video_url" class="w-full rounded px-3 py-2 border">
            @error('video_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
