<div class="fi-card mb-6 p-4">
    <h3 class="text-lg font-bold mb-2">إعلانات فيديو الرعاة</h3>
    <form wire:submit.prevent="save" class="flex flex-col gap-2 mb-4">
        <input type="text" wire:model.defer="video_url" placeholder="رابط الفيديو" class="fi-input" required>
        <input type="number" wire:model.defer="skip_after_seconds" placeholder="مدة التخطي بالثواني" class="fi-input" min="1">
        <button type="submit" class="fi-btn">{{ $editId ? 'تعديل' : 'إضافة' }}</button>
        @if($editId)
            <button type="button" wire:click="$set('editId', null)" class="fi-btn bg-gray-500">إلغاء التعديل</button>
        @endif
    </form>
    <table class="fi-ta-table w-full">
        <thead><tr><th>رابط الفيديو</th><th>مدة التخطي</th><th>إجراءات</th></tr></thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td><a href="{{ $video->video_url }}" target="_blank">{{ $video->video_url }}</a></td>
                <td>{{ $video->skip_after_seconds }} ثانية</td>
                <td>
                    <button wire:click="edit({{ $video->id }})" class="fi-btn">تعديل</button>
                    <button wire:click="delete({{ $video->id }})" class="fi-btn bg-red-600">حذف</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
