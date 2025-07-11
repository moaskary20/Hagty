<div class="fi-card p-4">
    <h2 class="text-lg font-bold mb-2">إدارة مواضيع المدونة</h2>
    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}" class="space-y-2">
        <input type="text" wire:model.defer="title" placeholder="عنوان الموضوع" class="fi-input w-full" />
        <textarea wire:model.defer="content" placeholder="المحتوى" class="fi-textarea w-full"></textarea>
        <select wire:model.defer="category_id" class="fi-select w-full">
            <option value="">اختر القسم</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <input type="text" wire:model.defer="image" placeholder="رابط الصورة (اختياري)" class="fi-input w-full" />
        <button type="submit" class="fi-btn w-full">{{ $editMode ? 'تحديث' : 'إضافة' }}</button>
        @if($editMode)
            <button type="button" wire:click="$set('editMode', false)" class="fi-btn w-full bg-gray-500">إلغاء</button>
        @endif
    </form>
    <ul class="mt-4 space-y-1">
        @foreach($trends as $trend)
            <li class="flex flex-col md:flex-row justify-between items-center bg-gray-100 p-2 rounded mb-2">
                <div>
                    <span class="font-bold">{{ $trend->title }}</span>
                    <span class="text-xs text-gray-500">({{ $trend->category->name ?? '' }})</span>
                </div>
                <div class="flex gap-2 mt-2 md:mt-0">
                    <button wire:click="edit({{ $trend->id }})" class="fi-btn">تعديل</button>
                    <button wire:click="delete({{ $trend->id }})" class="fi-btn bg-red-600">حذف</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
