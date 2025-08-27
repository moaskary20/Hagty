<div class="fi-card p-4">
    <h2 class="text-lg font-bold mb-2">إدارة أقسام المدونة</h2>
    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}" class="space-y-2">
        <input type="text" wire:model.defer="name" placeholder="اسم القسم" class="fi-input w-full" />
        <textarea wire:model.defer="description" placeholder="وصف القسم" class="fi-textarea w-full"></textarea>
        <button type="submit" class="fi-btn w-full">{{ $editMode ? 'تحديث' : 'إضافة' }}</button>
        @if($editMode)
            <button type="button" wire:click="$set('editMode', false)" class="fi-btn w-full bg-gray-500">إلغاء</button>
        @endif
    </form>
    <ul class="mt-4 space-y-1">
        @foreach($categories as $cat)
            <li class="flex justify-between items-center bg-gray-100 p-2 rounded">
                <span>{{ $cat->name }}</span>
                <div>
                    <button wire:click="edit({{ $cat->id }})" class="fi-btn">تعديل</button>
                    <button wire:click="delete({{ $cat->id }})" class="fi-btn bg-red-600">حذف</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
