<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Catering;

class CateringList extends Component
{
    public $search = '';
    public $status = '';

    protected $listeners = [
        'cateringSaved' => 'render',
    ];

    public function delete($id)
    {
        Catering::findOrFail($id)->delete();
        session()->flash('message', 'تم حذف الخدمة بنجاح');
    }

    public function render()
    {
        $query = Catering::query();
        if ($this->search) {
            $query->where('brand', 'like', "%{$this->search}%");
        }
        if ($this->status) {
            $query->where('status', $this->status);
        }
        $caterings = $query->orderByDesc('created_at')->get();
        return view('livewire.catering-list', compact('caterings'));
    }
}
