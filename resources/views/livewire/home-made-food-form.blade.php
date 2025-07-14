<div>
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block mb-1">اسم المطبخ أو الطاهية <span class="text-pink-500">*</span></label>
            <input type="text" wire:model.defer="name" class="w-full rounded px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-pink-400" required>
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">الموقع الجغرافي (Google Map)</label>
            <input type="text" wire:model.defer="location" class="w-full rounded px-3 py-2 border" placeholder="مثال: الرياض - حي النرجس">
            @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">رابط Google Maps</label>
            <input type="url" wire:model.defer="map_url" class="w-full rounded px-3 py-2 border" placeholder="https://maps.google.com/...">
            @error('map_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">رقم الهاتف</label>
            <input type="text" wire:model.defer="phone" class="w-full rounded px-3 py-2 border">
            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">نوع الأكل أو التخصص</label>
            <input type="text" wire:model.defer="specialty" class="w-full rounded px-3 py-2 border">
            @error('specialty') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">معلومات عامة</label>
            <textarea wire:model.defer="description" class="w-full rounded px-3 py-2 border"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-1">صورة المطبخ</label>
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
