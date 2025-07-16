<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Bazaar;

class BazaarCalendar extends Component
{
    public $showBazaarInfoModal = false;
    public $showBookingModal = false;
    public $bazaarDetails = null;

    public function openBazaarInfoModal($id)
    {
        $this->bazaarDetails = \App\Models\Bazaar::find($id);
        $this->showBazaarInfoModal = true;
    }

    public function openBookingModal($id)
    {
        $this->bazaarDetails = \App\Models\Bazaar::find($id);
        $this->showBookingModal = true;
    }

    public function closeBazaarInfoModal()
    {
        $this->showBazaarInfoModal = false;
        $this->bazaarDetails = null;
    }

    public function closeBookingModal()
    {
        $this->showBookingModal = false;
        $this->bazaarDetails = null;
    }
    protected $listeners = ['bazaarSaved' => 'closeAddBazaarModal'];

    public function closeAddBazaarModal()
    {
        $this->showAddBazaarModal = false;
    }
    public $showAddBazaarModal = false;
    public $showEditBazaarModal = false;
    public function openAddBazaarModal()
    {
        $this->showAddBazaarModal = true;
    }

    public function openEditBazaarModal()
    {
        $this->showEditBazaarModal = true;
    }
    public $city = '';
    public $type = '';
    public $currentMonth;
    public $currentYear;

    public function mount()
    {
        $this->currentMonth = date('m');
        $this->currentYear = date('Y');
    }

    public function previousMonth()
    {
        if ($this->currentMonth == 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        } else {
            $this->currentMonth--;
        }
    }

    public function nextMonth()
    {
        if ($this->currentMonth == 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        } else {
            $this->currentMonth++;
        }
    }

    public function getCurrentMonthNameProperty()
    {
        $months = ['يناير','فبراير','مارس','أبريل','مايو','يونيو','يوليو','أغسطس','سبتمبر','أكتوبر','نوفمبر','ديسمبر'];
        return $months[$this->currentMonth-1];
    }

    public function render()
    {
        $query = Bazaar::query();
        if ($this->city) $query->where('city', $this->city);
        if ($this->type) $query->where('info', 'like', "%{$this->type}%");
        $bazaars = $query->whereMonth('start_date', $this->currentMonth)
            ->whereYear('start_date', $this->currentYear)
            ->orderBy('start_date')->get();
        $cities = Bazaar::select('city')->distinct()->pluck('city');
        $types = ['بازار','فعالية','مهرجان'];
        return view('livewire.bazaar-calendar', [
            'bazaars' => $bazaars,
            'cities' => $cities,
            'types' => $types,
            'currentMonthName' => $this->currentMonthName,
            'currentYear' => $this->currentYear,
        ]);
    }
}
