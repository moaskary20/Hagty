<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Catering;

class CateringForm extends Component
{
    use WithFileUploads;

    public $cateringId;
    public $brand;
    public $description;
    public $address;
    public $phone;
    public $image;
    public $status = 'active';

    protected $rules = [
        'brand' => 'required|string|max:255',
        'description' => 'nullable|string',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'image' => 'nullable|image|max:2048',
        'status' => 'required|in:active,inactive',
    ];

    protected $listeners = [
        'editCatering' => 'loadCatering',
        'resetCateringForm' => 'resetForm',
    ];

    public function save()
    {
        $this->validate();
        $imagePath = $this->image ? $this->image->store('caterings', 'public') : null;
        Catering::updateOrCreate(
            ['id' => $this->cateringId],
            [
                'brand' => $this->brand,
                'description' => $this->description,
                'address' => $this->address,
                'phone' => $this->phone,
                'image' => $imagePath,
                'status' => $this->status,
            ]
        );
        $this->dispatch('cateringSaved');
        $this->resetForm();
        session()->flash('message', $this->cateringId ? 'تم تحديث الخدمة بنجاح' : 'تم إضافة الخدمة بنجاح');
    }

    public function loadCatering($id)
    {
        $catering = Catering::findOrFail($id);
        $this->cateringId = $catering->id;
        $this->brand = $catering->brand;
        $this->description = $catering->description;
        $this->address = $catering->address;
        $this->phone = $catering->phone;
        $this->image = $catering->image;
        $this->status = $catering->status;
    }

    public function resetForm()
    {
        $this->cateringId = null;
        $this->brand = '';
        $this->description = '';
        $this->address = '';
        $this->phone = '';
        $this->image = null;
        $this->status = 'active';
    }

    public function render()
    {
        return view('livewire.catering-form');
    }
}
