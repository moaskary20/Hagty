<div>
    @if($success)
        <div style="color: green; margin-bottom: 1rem;">{{ $office_id ? 'تم تعديل بيانات المكتب بنجاح!' : 'تم إضافة المكتب بنجاح!' }}</div>
    @endif
    <form wire:submit.prevent="save">
        <div style="margin-bottom:1rem;">
            <label>العلامة التجارية:</label>
            <input type="text" wire:model="brand" class="form-control" required>
            @error('brand') <span style="color:red">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>العنوان:</label>
            <input type="text" wire:model="address" class="form-control" required>
            @error('address') <span style="color:red">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>رقم الهاتف:</label>
            <input type="text" wire:model="phone" class="form-control" required>
            @error('phone') <span style="color:red">{{ $message }}</span> @enderror
        </div>
        <div style="margin-bottom:1rem;">
            <label>رابط الصفحة:</label>
            <input type="url" wire:model="page_url" class="form-control">
            @error('page_url') <span style="color:red">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-pink">{{ $office_id ? 'تعديل المكتب' : 'حفظ المكتب' }}</button>
    </form>
</div>
