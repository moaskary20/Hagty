<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WomenCamp;

class WomenCampForm extends Component
{
    public $campId;
    public $name;
    public $location;
    public $description;
    public $contact;
    public $status = 'active';

    protected $rules = [
        'name' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'contact' => 'nullable|string|max:255',
        'status' => 'required|in:active,inactive',
    ];

    protected $listeners = [
        'editWomenCamp' => 'loadCamp',
        'resetWomenCampForm' => 'resetForm',
    ];

    public function save()
    {
        $this->validate();
        WomenCamp::updateOrCreate(
            ['id' => $this->campId],
            [
                'name' => $this->name,
                'location' => $this->location,
                'description' => $this->description,
                'contact' => $this->contact,
                'status' => $this->status,
            ]
        );
        $this->dispatch('womenCampSaved');
        $this->resetForm();
        session()->flash('message', $this->campId ? 'تم تحديث المخيم بنجاح' : 'تم إضافة المخيم بنجاح');
    }

    public function loadCamp($id)
    {
        $camp = WomenCamp::findOrFail($id);
        $this->campId = $camp->id;
        $this->name = $camp->name;
        $this->location = $camp->location;
        $this->description = $camp->description;
        $this->contact = $camp->contact;
        $this->status = $camp->status;
    }

    public function resetForm()
    {
        $this->campId = null;
        $this->name = '';
        $this->location = '';
        $this->description = '';
        $this->contact = '';
        $this->status = 'active';
    }

    public function render()
    {
        return view('livewire.women-camp-form');
    }
}
