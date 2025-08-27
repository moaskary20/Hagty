<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TravelOffer;

class TravelOfferList extends Component
{
    public $search = '';
    public $destination = '';
    public $date = '';

    public function render()
    {
        $offers = TravelOffer::query()
            ->when($this->destination, fn($q) => $q->where('destination', 'like', '%'.$this->destination.'%'))
            ->when($this->date, fn($q) => $q->where('date', $this->date))
            ->when($this->search, fn($q) => $q->where('title', 'like', '%'.$this->search.'%'))
            ->orderByDesc('date')
            ->get();
        return view('livewire.travel-offer-list', compact('offers'));
    }

    public function deleteOffer($id)
    {
        $offer = TravelOffer::find($id);
        if ($offer) {
            $offer->delete();
            session()->flash('message', 'تم حذف العرض بنجاح');
        } else {
            session()->flash('error', 'العرض غير موجود');
        }
    }
}
