<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hotel;

class HotelList extends Component
{
    public $search = '';
    public $statusFilter = '';
    public $brandFilter = '';
    protected $listeners = ['deleteHotel' => 'deleteHotel'];

    public function deleteHotel($id)
    {
        $hotel = Hotel::find($id);
        if ($hotel) {
            $hotel->delete();
            session()->flash('message', 'تم حذف الفندق بنجاح');
        }
    }

    public function render()
    {
        $query = Hotel::query();
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('location', 'like', '%'.$this->search.'%');
            });
        }
        if ($this->brandFilter) {
            $query->where('brand', $this->brandFilter);
        }
        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }
        $hotels = $query->orderBy('name')->get();
        $brands = Hotel::select('brand')->distinct()->pluck('brand');
        return view('livewire.hotel-list', [
            'hotels' => $hotels,
            'brands' => $brands,
        ]);
    }
}
