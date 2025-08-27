<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PlateOfTheDay;

class PlateOfTheDayList extends Component
{
    public $search = '';
    public $status = '';

    protected $listeners = [
        'plateOfTheDaySaved' => 'render',
    ];

    public function delete($id)
    {
        PlateOfTheDay::findOrFail($id)->delete();
        session()->flash('message', 'تم حذف الطبق بنجاح');
    }

    public function render()
    {
        $query = PlateOfTheDay::query();
        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%");
        }
        if ($this->status) {
            $query->where('status', $this->status);
        }
        $plates = $query->orderByDesc('created_at')->get();
        return view('livewire.plate-of-the-day-list', compact('plates'));
    }
}
