<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeMadeFood;

class HomeMadeFoodForm extends Component
{
    use WithFileUploads;

    public $foodId;
    public $name;
    public $location;
    public $phone;
    public $description;
    public $specialty;
    public $map_url;
    public $image;
    public $status = 'active';

    protected $rules = [
        'name' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'specialty' => 'nullable|string|max:255',
        'map_url' => 'nullable|url',
        'image' => 'nullable|image|max:2048',
        'status' => 'required|in:active,inactive',
    ];

    protected $listeners = [
        'editHomeMadeFood' => 'loadFood',
        'resetHomeMadeFoodForm' => 'resetForm',
    ];

    public function save()
    {
        $this->validate();
        $imagePath = $this->image ? $this->image->store('home-foods', 'public') : null;
        HomeMadeFood::updateOrCreate(
            ['id' => $this->foodId],
            [
                'name' => $this->name,
                'location' => $this->location,
                'phone' => $this->phone,
                'description' => $this->description,
                'specialty' => $this->specialty,
                'map_url' => $this->map_url,
                'image' => $imagePath,
                'status' => $this->status,
            ]
        );
        $this->dispatch('homeMadeFoodSaved');
        $this->resetForm();
        session()->flash('message', $this->foodId ? 'تم تحديث المطبخ بنجاح' : 'تم إضافة المطبخ بنجاح');
    }

    public function loadFood($id)
    {
        $food = HomeMadeFood::findOrFail($id);
        $this->foodId = $food->id;
        $this->name = $food->name;
        $this->location = $food->location;
        $this->phone = $food->phone;
        $this->description = $food->description;
        $this->specialty = $food->specialty;
        $this->map_url = $food->map_url;
        $this->image = $food->image;
        $this->status = $food->status;
    }

    public function resetForm()
    {
        $this->foodId = null;
        $this->name = '';
        $this->location = '';
        $this->phone = '';
        $this->description = '';
        $this->specialty = '';
        $this->map_url = '';
        $this->image = null;
        $this->status = 'active';
    }

    public function render()
    {
        return view('livewire.home-made-food-form');
    }
}
