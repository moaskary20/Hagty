<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HomeMadeFood;

class HomeMadeFoodList extends Component
{
    public $search = '';
    public $status = '';

    protected $listeners = [
        'homeMadeFoodSaved' => 'render',
    ];

    public function delete($id)
    {
        HomeMadeFood::findOrFail($id)->delete();
        session()->flash('message', 'تم حذف المطبخ بنجاح');
    }

    public function render()
    {
        $query = HomeMadeFood::query();
        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%");
        }
        if ($this->status) {
            $query->where('status', $this->status);
        }
        $foods = $query->orderByDesc('created_at')->get();
        return view('livewire.home-made-food-list', compact('foods'));
    }
}
