<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Bazaar;

class BazaarList extends Component
{
    public function render()
    {
        $bazaars = Bazaar::orderByDesc('start_date')->get();
        return view('livewire.bazaar-list', compact('bazaars'));
    }
}
