<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WomenCamp;

class WomenCampList extends Component
{
    public $search = '';
    public $status = '';

    protected $listeners = [
        'womenCampSaved' => 'render',
    ];

    public function delete($id)
    {
        WomenCamp::findOrFail($id)->delete();
        session()->flash('message', 'تم حذف المخيم بنجاح');
    }

    public function render()
    {
        $query = WomenCamp::query();
        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%");
        }
        if ($this->status) {
            $query->where('status', $this->status);
        }
        $camps = $query->orderByDesc('created_at')->get();
        return view('livewire.women-camp-list', compact('camps'));
    }
}
