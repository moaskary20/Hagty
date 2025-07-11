<div class="fi-card p-4">
    <h2 class="text-lg font-bold mb-2">إدارة فيديوهات المدونة</h2>
    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}" class="space-y-2">
        <select wire:model.defer="trend_id" class="fi-select w-full">
            <option value="">اختر الموضوع</option>
            @foreach($trends as $trend)
                <option value="{{ $trend->id }}">{{ $trend->title }}</option>
            @endforeach
        </select>
        <input type="text" wire:model.defer="title" placeholder="عنوان الفيديو" class="fi-input w-full" />
        <input type="text" wire:model.defer="video_url" placeholder="رابط الفيديو (YouTube)" class="fi-input w-full" />
        <textarea wire:model.defer="description" placeholder="وصف الفيديو" class="fi-textarea w-full"></textarea>
        <button type="submit" class="fi-btn w-full">{{ $editMode ? 'تحديث' : 'إضافة' }}</button>
        @if($editMode)
            <button type="button" wire:click="$set('editMode', false)" class="fi-btn w-full bg-gray-500">إلغاء</button>
        @endif
    </form>
    <ul class="mt-4 space-y-1">
        @foreach($videos as $video)
            <li class="flex flex-col md:flex-row justify-between items-center bg-gray-100 p-2 rounded mb-2">
                <div>
                    <span class="font-bold">{{ $video->title }}</span>
                    <span class="text-xs text-gray-500">({{ $video->trend->title ?? '' }})</span>
                </div>
                <div class="flex gap-2 mt-2 md:mt-0">
                    <button wire:click="edit({{ $video->id }})" class="fi-btn">تعديل</button>
                    <button wire:click="delete({{ $video->id }})" class="fi-btn bg-red-600">حذف</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
