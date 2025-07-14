<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FamilyHealthRecord;

class MyFamilyHealthComponent extends Component
{
    // Modal states
    public $showHealthRecordModal = false;

    // Form data
    public $healthRecordForm = [];

    // Editing state
    public $editingHealthRecord = null;

    public function openHealthRecordModal()
    {
        $this->resetForm();
        $this->showHealthRecordModal = true;
    }

    public function closeHealthRecordModal()
    {
        $this->showHealthRecordModal = false;
        $this->resetForm();
    }

    public function saveHealthRecord()
    {
        $this->validate([
            'healthRecordForm.member_name' => 'required|string|max:255',
            'healthRecordForm.relationship' => 'required|string',
            'healthRecordForm.birth_date' => 'nullable|date',
            'healthRecordForm.blood_type' => 'nullable|string',
            'healthRecordForm.chronic_diseases' => 'nullable|string',
            'healthRecordForm.allergies' => 'nullable|string',
            'healthRecordForm.current_medications' => 'nullable|string',
            'healthRecordForm.family_doctor' => 'nullable|string',
            'healthRecordForm.doctor_phone' => 'nullable|string',
            'healthRecordForm.emergency_notes' => 'nullable|string',
            'healthRecordForm.height' => 'nullable|numeric',
            'healthRecordForm.weight' => 'nullable|numeric',
            'healthRecordForm.insurance_company' => 'nullable|string',
            'healthRecordForm.insurance_number' => 'nullable|string',
        ]);

        if ($this->editingHealthRecord) {
            $this->editingHealthRecord->update($this->healthRecordForm);
            session()->flash('message', 'تم تحديث السجل الصحي بنجاح');
        } else {
            FamilyHealthRecord::create($this->healthRecordForm);
            session()->flash('message', 'تم إضافة السجل الصحي بنجاح');
        }

        $this->closeHealthRecordModal();
    }

    public function editHealthRecord($id)
    {
        $this->editingHealthRecord = FamilyHealthRecord::find($id);
        $this->healthRecordForm = $this->editingHealthRecord->toArray();
        $this->showHealthRecordModal = true;
    }

    public function deleteHealthRecord($id)
    {
        $record = FamilyHealthRecord::find($id);
        if ($record) {
            $record->delete();
            session()->flash('message', 'تم حذف السجل الصحي بنجاح');
        }
    }

    private function resetForm()
    {
        $this->healthRecordForm = [];
        $this->editingHealthRecord = null;
    }

    public function render()
    {
        return view('livewire.my-family-health-component', [
            'healthRecords' => FamilyHealthRecord::latest()->get()
        ]);
    }
}
