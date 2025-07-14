<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BeTheChef;

class BeTheChefList extends Component
{
    public $search = '';
    public $status = '';

    protected $listeners = [
        'beTheChefSaved' => 'render',
    ];

    public function delete($id)
    {
        BeTheChef::findOrFail($id)->delete();
        session()->flash('message', 'تم حذف الدورة/الفيديو بنجاح');
    }

    public function render()
    {
        $query = BeTheChef::query();
        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%");
        }
        if ($this->status) {
            $query->where('status', $this->status);
        }
        $chefs = $query->orderByDesc('created_at')->get();
        return view('livewire.be-the-chef-list', compact('chefs'));
    }
}
