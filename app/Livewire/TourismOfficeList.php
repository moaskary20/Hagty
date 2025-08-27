<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TourismOffice;

class TourismOfficeList extends Component
{
    public $search = '';

    public function render()
    {
        $offices = TourismOffice::where('brand', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orWhere('phone', 'like', '%'.$this->search.'%')
            ->get();
        return view('livewire.tourism-office-list', compact('offices'));
    }

    public function deleteOffice($id)
    {
        $office = TourismOffice::find($id);
        if ($office) {
            $office->delete();
            session()->flash('message', 'تم حذف المكتب بنجاح');
        } else {
            session()->flash('error', 'المكتب غير موجود');
        }
    }

    public function editOffice($id)
    {
        $this->emit('loadOffice', $id);
        // فتح المودال عبر جافاسكريبت
        echo "<script>document.getElementById('addOfficeModal').style.display='block';</script>";
    }
}
