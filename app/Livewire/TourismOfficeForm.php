<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TourismOffice;

class TourismOfficeForm extends Component
{
    public $brand;
    public $address;
    public $phone;
    public $page_url;
    public $success = false;
    public $office_id = null;

    protected $rules = [
        'brand' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'page_url' => 'nullable|url',
    ];

    protected $listeners = ['editOffice' => 'loadOffice'];

    public function loadOffice($id)
    {
        $office = TourismOffice::find($id);
        if ($office) {
            $this->office_id = $office->id;
            $this->brand = $office->brand;
            $this->address = $office->address;
            $this->phone = $office->phone;
            $this->page_url = $office->page_url;
        }
    }

    public function save()
    {
        $this->validate();
        if ($this->office_id) {
            $office = TourismOffice::find($this->office_id);
            if ($office) {
                $office->update([
                    'brand' => $this->brand,
                    'address' => $this->address,
                    'phone' => $this->phone,
                    'page_url' => $this->page_url,
                ]);
                $this->success = true;
                session()->flash('message', 'تم تعديل بيانات المكتب بنجاح');
            }
        } else {
            TourismOffice::create([
                'brand' => $this->brand,
                'address' => $this->address,
                'phone' => $this->phone,
                'page_url' => $this->page_url,
            ]);
            $this->success = true;
            session()->flash('message', 'تم إضافة المكتب بنجاح');
        }
        $this->reset(['brand', 'address', 'phone', 'page_url', 'office_id']);
        $this->emit('office-added');
    }

    public function render()
    {
        return view('livewire.tourism-office-form');
    }
}
