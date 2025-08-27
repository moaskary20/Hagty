<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FamilyAdvice;

class FamilyAdviceModal extends Component
{
    public $showAdviceModal = false;
    public $adviceForm = [];
    public $editingAdvice = null;
    public $selectedType = '';
    public $selectedCategory = '';

    public function showAdviceModal()
    {
        $this->resetForm();
        $this->showAdviceModal = true;
    }

    public function closeAdviceModal()
    {
        $this->showAdviceModal = false;
        $this->resetForm();
    }

    public function saveAdvice()
    {
        $this->validate([
            'adviceForm.title' => 'required|string|max:255',
            'adviceForm.type' => 'required|string',
            'adviceForm.content' => 'required|string',
            'adviceForm.expert_name' => 'nullable|string',
            'adviceForm.expert_credentials' => 'nullable|string',
            'adviceForm.contact_info' => 'nullable|string',
            'adviceForm.video_url' => 'nullable|url',
            'adviceForm.category' => 'required|string',
            'adviceForm.target_audience' => 'required|string',
            'adviceForm.duration_minutes' => 'nullable|integer',
            'adviceForm.rating' => 'nullable|numeric|between:1,5',
        ]);

        if ($this->editingAdvice) {
            $this->editingAdvice->update($this->adviceForm);
            session()->flash('message', 'تم تحديث النصيحة بنجاح');
        } else {
            FamilyAdvice::create($this->adviceForm);
            session()->flash('message', 'تم إضافة النصيحة بنجاح');
        }

        $this->closeAdviceModal();
    }

    public function editAdvice($id)
    {
        $this->editingAdvice = FamilyAdvice::find($id);
        $this->adviceForm = $this->editingAdvice->toArray();
        $this->showAdviceModal = true;
    }

    public function deleteAdvice($id)
    {
        $advice = FamilyAdvice::find($id);
        if ($advice) {
            $advice->delete();
            session()->flash('message', 'تم حذف النصيحة بنجاح');
        }
    }

    private function resetForm()
    {
        $this->adviceForm = [];
        $this->editingAdvice = null;
    }

    public function render()
    {
        $query = FamilyAdvice::query();
        if ($this->selectedType) {
            $query->where('type', $this->selectedType);
        }
        if ($this->selectedCategory) {
            $query->where('category', $this->selectedCategory);
        }
        return view('livewire.family-advice-modal', [
            'adviceList' => $query->latest()->get()
        ]);
    }
}
