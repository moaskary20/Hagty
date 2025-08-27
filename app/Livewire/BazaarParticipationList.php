<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\BazaarParticipation;

class BazaarParticipationList extends Component
{
    public function render()
    {
        $participations = BazaarParticipation::orderByDesc('created_at')->get();
        return view('livewire.bazaar-participation-list', compact('participations'));
    }
}
