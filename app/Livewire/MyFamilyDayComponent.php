<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FamilyOutingArea;
use App\Models\FamilyActivity;

class MyFamilyDayComponent extends Component
{
    // Modal states
    public $showOutingAreaModal = false;
    public $showActivityModal = false;

    // Form data
    public $outingAreaForm = [];
    public $activityForm = [];

    // Editing states
    public $editingOutingArea = null;
    public $editingActivity = null;

    // Filters
    public $selectedType = '';

    public function openOutingAreaModal()
    {
        $this->resetOutingForm();
        $this->showOutingAreaModal = true;
    }

    public function closeOutingAreaModal()
    {
        $this->showOutingAreaModal = false;
        $this->resetOutingForm();
    }

    public function openActivityModal()
    {
        $this->resetActivityForm();
        $this->showActivityModal = true;
    }

    public function closeActivityModal()
    {
        $this->showActivityModal = false;
        $this->resetActivityForm();
    }

    public function saveOutingArea()
    {
        $this->validate([
            'outingAreaForm.name' => 'required|string|max:255',
            'outingAreaForm.type' => 'required|string',
            'outingAreaForm.address' => 'required|string',
            'outingAreaForm.phone' => 'nullable|string',
            'outingAreaForm.description' => 'nullable|string',
            'outingAreaForm.rating' => 'nullable|numeric|between:1,5',
            'outingAreaForm.price_range' => 'nullable|string',
            'outingAreaForm.working_hours' => 'nullable|string',
            'outingAreaForm.website' => 'nullable|url',
            'outingAreaForm.age_group' => 'nullable|string',
            'outingAreaForm.special_notes' => 'nullable|string',
        ]);

        if ($this->editingOutingArea) {
            $this->editingOutingArea->update($this->outingAreaForm);
            session()->flash('message', 'تم تحديث المكان بنجاح');
        } else {
            FamilyOutingArea::create($this->outingAreaForm);
            session()->flash('message', 'تم إضافة المكان بنجاح');
        }

        $this->closeOutingAreaModal();
    }

    public function saveActivity()
    {
        $this->validate([
            'activityForm.activity_name' => 'required|string|max:255',
            'activityForm.category' => 'required|string',
            'activityForm.description' => 'required|string',
            'activityForm.location' => 'required|string',
            'activityForm.organizer' => 'nullable|string',
            'activityForm.contact_phone' => 'nullable|string',
            'activityForm.cost' => 'nullable|numeric',
            'activityForm.duration' => 'nullable|string',
            'activityForm.age_group' => 'nullable|string',
            'activityForm.available_from' => 'nullable|date',
            'activityForm.available_to' => 'nullable|date',
            'activityForm.booking_method' => 'nullable|string',
            'activityForm.special_features' => 'nullable|string',
        ]);

        if ($this->editingActivity) {
            $this->editingActivity->update($this->activityForm);
            session()->flash('message', 'تم تحديث النشاط بنجاح');
        } else {
            FamilyActivity::create($this->activityForm);
            session()->flash('message', 'تم إضافة النشاط بنجاح');
        }

        $this->closeActivityModal();
    }

    public function editOutingArea($id)
    {
        $this->editingOutingArea = FamilyOutingArea::find($id);
        $this->outingAreaForm = $this->editingOutingArea->toArray();
        $this->showOutingAreaModal = true;
    }

    public function deleteOutingArea($id)
    {
        $area = FamilyOutingArea::find($id);
        if ($area) {
            $area->delete();
            session()->flash('message', 'تم حذف المكان بنجاح');
        }
    }

    public function editActivity($id)
    {
        $this->editingActivity = FamilyActivity::find($id);
        $this->activityForm = $this->editingActivity->toArray();
        $this->showActivityModal = true;
    }

    public function deleteActivity($id)
    {
        $activity = FamilyActivity::find($id);
        if ($activity) {
            $activity->delete();
            session()->flash('message', 'تم حذف النشاط بنجاح');
        }
    }

    private function resetOutingForm()
    {
        $this->outingAreaForm = [];
        $this->editingOutingArea = null;
    }

    private function resetActivityForm()
    {
        $this->activityForm = [];
        $this->editingActivity = null;
    }

    public function render()
    {
        $query = FamilyOutingArea::query();
        
        if ($this->selectedType) {
            $query->where('type', $this->selectedType);
        }
        
        return view('livewire.my-family-day-component', [
            'outingAreas' => $query->latest()->get(),
            'activities' => FamilyActivity::latest()->get()
        ]);
    }
}
