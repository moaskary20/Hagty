<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\BazaarBooking;
use App\Models\Bazaar;

class BazaarBookingForm extends Component
{
    public $booking_id;
    public $bazaar_id;
    public $participant_name;
    public $project_name;
    public $phone;
    public $email;
    public $city;
    public $location;
    public $date;
    public $days = 1;
    public $notes;

    protected $rules = [
        'bazaar_id' => 'required|exists:bazaars,id',
        'participant_name' => 'required',
        'phone' => 'required',
        'city' => 'required',
        'date' => 'required|date',
        'days' => 'required|integer|min:1',
    ];

    public function mount($booking = null)
    {
        if ($booking) {
            $this->booking_id = $booking->id;
            $this->bazaar_id = $booking->bazaar_id;
            $this->participant_name = $booking->participant_name;
            $this->project_name = $booking->project_name;
            $this->phone = $booking->phone;
            $this->email = $booking->email;
            $this->city = $booking->city;
            $this->location = $booking->location;
            $this->date = $booking->date;
            $this->days = $booking->days;
            $this->notes = $booking->notes;
        }
    }

    public function save()
    {
        $this->validate();
        BazaarBooking::updateOrCreate(
            ['id' => $this->booking_id],
            [
                'bazaar_id' => $this->bazaar_id,
                'participant_name' => $this->participant_name,
                'project_name' => $this->project_name,
                'phone' => $this->phone,
                'email' => $this->email,
                'city' => $this->city,
                'location' => $this->location,
                'date' => $this->date,
                'days' => $this->days,
                'notes' => $this->notes,
            ]
        );
        session()->flash('message', 'تم حفظ الحجز بنجاح');
        $this->emitUp('bookingSaved');
    }

    public function render()
    {
        $bazaars = Bazaar::all();
        return view('livewire.bazaar-booking-form', compact('bazaars'));
    }
}
