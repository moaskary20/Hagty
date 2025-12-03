<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Bazaar;

class BazaarCalendar extends Component
{
    // Modal flags
    public $showAddBazaarModal = false;
    public $showEditBazaarModal = false;
    public $showBazaarInfoModal = false;
    public $showBookingModal = false;
    public $bazaarDetails = null;
    
    // Form properties
    public $bazaar_id;
    public $bazaarName = '';
    public $info = '';
    public $start_date = '';
    public $end_date = '';
    public $bazaarCity = '';
    public $location = '';
    public $map_url = '';
    public $promo = '';
    public $discounts = '';
    
    // Filter properties
    public $city = '';
    public $type = '';
    public $currentMonth;
    public $currentYear;
    
    protected $listeners = ['bazaarSaved' => 'closeAddBazaarModal'];

    public function closeAddBazaarModal()
    {
        $this->showAddBazaarModal = false;
    }
    
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
    public function openAddBazaarModal()
    {
        \Log::info('Open add bazaar modal called');
        $this->resetForm();
        $this->showAddBazaarModal = true;
        $this->dispatch('modalOpened', 'add');
    }

    public function openEditBazaarModal()
    {
        \Log::info('Open edit bazaar modal called');
        $this->showEditBazaarModal = true;
        $this->dispatch('modalOpened', 'edit');
    }
    
    public function resetForm()
    {
        $this->bazaar_id = null;
        $this->bazaarName = '';
        $this->info = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->bazaarCity = '';
        $this->location = '';
        $this->map_url = '';
        $this->promo = '';
        $this->discounts = '';
    }
    
    public function saveBazaar()
    {
        \Log::info('Save bazaar called');
        
        $validated = $this->validate([
            'bazaarName' => 'required|min:3',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'bazaarCity' => 'required',
        ]);
        
        try {
            Bazaar::updateOrCreate(
                ['id' => $this->bazaar_id],
                [
                    'name' => $this->bazaarName,
                    'info' => $this->info,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'city' => $this->bazaarCity,
                    'location' => $this->location,
                    'map_url' => $this->map_url,
                    'promo' => $this->promo,
                    'discounts' => $this->discounts,
                ]
            );
            
            session()->flash('message', 'تم حفظ بيانات البازار بنجاح');
            $this->showAddBazaarModal = false;
            $this->resetForm();
        } catch (\Exception $e) {
            \Log::error('Error saving bazaar: ' . $e->getMessage());
            session()->flash('error', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function mount()
    {
        $this->currentMonth = date('m');
        $this->currentYear = date('Y');
    }

    public function previousMonth()
    {
        \Log::info('Previous month called');
        if ($this->currentMonth == 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        } else {
            $this->currentMonth--;
        }
        $this->dispatch('monthChanged');
    }

    public function nextMonth()
    {
        \Log::info('Next month called');
        if ($this->currentMonth == 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        } else {
            $this->currentMonth++;
        }
        $this->dispatch('monthChanged');
    }

    public function getCurrentMonthNameProperty()
    {
        $months = ['يناير','فبراير','مارس','أبريل','مايو','يونيو','يوليو','أغسطس','سبتمبر','أكتوبر','نوفمبر','ديسمبر'];
        return $months[$this->currentMonth-1] ?? 'ديسمبر';
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
