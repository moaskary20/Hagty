<?php

namespace App\Http\Livewire\Filament;

use Livewire\Component;

class TestCounter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.filament.test-counter');
    }
}
