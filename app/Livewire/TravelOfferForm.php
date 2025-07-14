<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TravelOffer;

class TravelOfferForm extends Component
{
    public $offer_id = null;
    public $destination;
    public $date;
    public $title;
    public $description;
    public $image;
    public $video;
    public $price;
    public $active = true;
    public $success = false;

    protected $listeners = ['loadOffer' => 'loadOffer'];

    protected $rules = [
        'destination' => 'required|string|max:255',
        'date' => 'required|date',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|string',
        'video' => 'nullable|string',
        'price' => 'nullable|numeric',
        'active' => 'boolean',
    ];

    public function loadOffer($id)
    {
        $offer = TravelOffer::find($id);
        if ($offer) {
            $this->offer_id = $offer->id;
            $this->destination = $offer->destination;
            $this->date = $offer->date;
            $this->title = $offer->title;
            $this->description = $offer->description;
            $this->image = $offer->image;
            $this->video = $offer->video;
            $this->price = $offer->price;
            $this->active = $offer->active;
        }
    }

    public function save()
    {
        $this->validate();
        if ($this->offer_id) {
            $offer = TravelOffer::find($this->offer_id);
            if ($offer) {
                $offer->update([
                    'destination' => $this->destination,
                    'date' => $this->date,
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $this->image,
                    'video' => $this->video,
                    'price' => $this->price,
                    'active' => $this->active,
                ]);
                $this->success = true;
            }
        } else {
            TravelOffer::create([
                'destination' => $this->destination,
                'date' => $this->date,
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->image,
                'video' => $this->video,
                'price' => $this->price,
                'active' => $this->active,
            ]);
            $this->success = true;
        }
        $this->reset(['offer_id','destination','date','title','description','image','video','price','active']);
        $this->dispatch('offer-added');
    }

    public function render()
    {
        return view('livewire.travel-offer-form');
    }
}
