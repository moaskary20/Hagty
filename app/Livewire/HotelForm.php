<?php

namespace App\Livewire;

use Livewire\Component;

class HotelForm extends Component
{
    public $name;
    public $brand;
    public $location;
    public $offers;
    public $status;
    public $hotelId = null;

    protected $listeners = ['editHotel' => 'loadHotel'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'offers' => 'nullable|string',
        'status' => 'required|string',
    ];

    public function loadHotel($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        if ($hotel) {
            $this->hotelId = $hotel->id;
            $this->name = $hotel->name;
            $this->brand = $hotel->brand;
            $this->location = $hotel->location;
            $this->offers = $hotel->offers;
            $this->status = $hotel->status;
        }
    }

    public function save()
    {
        $this->validate();
        if ($this->hotelId) {
            $hotel = \App\Models\Hotel::find($this->hotelId);
            if ($hotel) {
                $hotel->update([
                    'name' => $this->name,
                    'brand' => $this->brand,
                    'location' => $this->location,
                    'offers' => $this->offers,
                    'status' => $this->status,
                ]);
                session()->flash('message', 'تم تحديث الفندق بنجاح');
            }
        } else {
            \App\Models\Hotel::create([
                'name' => $this->name,
                'brand' => $this->brand,
                'location' => $this->location,
                'offers' => $this->offers,
                'status' => $this->status,
            ]);
            session()->flash('message', 'تم حفظ الفندق بنجاح');
        }
        $this->reset(['name', 'brand', 'location', 'offers', 'status', 'hotelId']);
        $this->dispatch('hotelSaved');
    }

    public function render()
    {
        return view('livewire.hotel-form');
    }
}
