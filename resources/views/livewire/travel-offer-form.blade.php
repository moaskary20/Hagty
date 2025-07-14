<div style="background: linear-gradient(135deg, #ec6da9 0%, #a259c3 100%); padding:2rem; border-radius:12px; color:#fff;">
    @if($success)
        <div style="color: #ffd700; margin-bottom: 1rem;">{{ $offer_id ? 'تم تعديل العرض بنجاح!' : 'تم إضافة العرض بنجاح!' }}</div>
    @endif
    <form wire:submit.prevent="save">
        <div style="margin-bottom:1rem;">
            <label>الوجهة:</label>
            <input type="text" wire:model="destination" class="form-control" required>
            @error('destination') <span style="color:#ffd700">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>التاريخ:</label>
            <input type="date" wire:model="date" class="form-control" required>
            @error('date') <span style="color:#ffd700">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>عنوان العرض:</label>
            <input type="text" wire:model="title" class="form-control" required>
            @error('title') <span style="color:#ffd700">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>وصف العرض:</label>
            <textarea wire:model="description" class="form-control" rows="2"></textarea>
            @error('description') <span style="color:#ffd700">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>رابط صورة:</label>
            <input type="text" wire:model="image" class="form-control">
            @error('image') <span style="color:#ffd700">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>رابط فيديو:</label>
            <input type="text" wire:model="video" class="form-control">
            @error('video') <span style="color:#ffd700">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>السعر:</label>
            <input type="number" wire:model="price" class="form-control">
            @error('price') <span style="color:#ffd700">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>نشط:</label>
            <input type="checkbox" wire:model="active">
        </div>
        <button type="submit" class="btn btn-pink">{{ $offer_id ? 'تعديل العرض' : 'حفظ العرض' }}</button>
    </form>
</div>
