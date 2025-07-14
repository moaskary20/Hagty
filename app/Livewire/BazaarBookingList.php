<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\BazaarBooking;

class BazaarBookingList extends Component
{
    public function render()
    {
        $bookings = BazaarBooking::with('bazaar')->orderByDesc('date')->get();
        return view('livewire.bazaar-booking-list', compact('bookings'));
    }
}
