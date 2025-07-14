<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Bazaar;

class BazaarForm extends Component
{
    public $bazaar_id;
    public $name;
    public $info;
    public $start_date;
    public $end_date;
    public $city;
    public $location;
    public $map_url;
    public $promo;
    public $discounts;

    protected $rules = [
        'name' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'city' => 'required',
    ];

    public function mount($bazaar = null)
    {
        if ($bazaar) {
            $this->bazaar_id = $bazaar->id;
            $this->name = $bazaar->name;
            $this->info = $bazaar->info;
            $this->start_date = $bazaar->start_date;
            $this->end_date = $bazaar->end_date;
            $this->city = $bazaar->city;
            $this->location = $bazaar->location;
            $this->map_url = $bazaar->map_url;
            $this->promo = $bazaar->promo;
            $this->discounts = $bazaar->discounts;
        }
    }

    public function save()
    {
        $this->validate();
        Bazaar::updateOrCreate(
            ['id' => $this->bazaar_id],
            [
                'name' => $this->name,
                'info' => $this->info,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'city' => $this->city,
                'location' => $this->location,
                'map_url' => $this->map_url,
                'promo' => $this->promo,
                'discounts' => $this->discounts,
            ]
        );
        session()->flash('message', 'تم حفظ بيانات البازار بنجاح');
        $this->emitUp('bazaarSaved');
    }

    public function render()
    {
        return view('livewire.bazaar-form');
    }
}
