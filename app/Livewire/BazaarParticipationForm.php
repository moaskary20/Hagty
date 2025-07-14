<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\BazaarParticipation;

class BazaarParticipationForm extends Component
{
    public $participation_id;
    public $name;
    public $activity_type;
    public $phone;
    public $email;
    public $city;
    public $description;

    protected $rules = [
        'name' => 'required',
        'activity_type' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'city' => 'required',
    ];

    public function mount($participation = null)
    {
        if ($participation) {
            $this->participation_id = $participation->id;
            $this->name = $participation->name;
            $this->activity_type = $participation->activity_type;
            $this->phone = $participation->phone;
            $this->email = $participation->email;
            $this->city = $participation->city;
            $this->description = $participation->description;
        }
    }

    public function save()
    {
        $this->validate();
        BazaarParticipation::updateOrCreate(
            ['id' => $this->participation_id],
            [
                'name' => $this->name,
                'activity_type' => $this->activity_type,
                'phone' => $this->phone,
                'email' => $this->email,
                'city' => $this->city,
                'description' => $this->description,
            ]
        );
        session()->flash('message', 'تم حفظ الاشتراك بنجاح');
        $this->emitUp('participationSaved');
    }

    public function render()
    {
        return view('livewire.bazaar-participation-form');
    }
}
