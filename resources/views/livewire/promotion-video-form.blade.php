<div>
    @if($success)
        <div style="color: green; margin-bottom: 1rem;">تم إضافة الفيديو بنجاح!</div>
    @endif
    <form wire:submit.prevent="save">
        <div style="margin-bottom:1rem;">
            <label>عنوان الفيديو:</label>
            <input type="text" wire:model="title" class="form-control" required>
            @error('title') <span style="color:red">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>رابط الفيديو (YouTube):</label>
            <input type="url" wire:model="url" class="form-control" required>
            @error('url') <span style="color:red">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>وصف مختصر:</label>
            <textarea wire:model="desc" class="form-control" rows="2"></textarea>
            @error('desc') <span style="color:red">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-pink">حفظ الفيديو</button>
    </form>
</div>
