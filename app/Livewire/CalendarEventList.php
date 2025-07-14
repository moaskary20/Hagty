<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CalendarEvent;

class CalendarEventList extends Component
{
    public $search = '';
    public $statusFilter = '';
    public $dateFilter = '';
    public function deleteEvent($id)
    {
        $event = CalendarEvent::find($id);
        if ($event) {
            $event->delete();
            session()->flash('message', 'تم حذف الفعالية بنجاح');
        }
    }

    public function render()
    {
        $query = CalendarEvent::query();
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('destination', 'like', '%'.$this->search.'%');
            });
        }
        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }
        if ($this->dateFilter) {
            $query->where('date', $this->dateFilter);
        }
        $events = $query->orderBy('date', 'asc')->get();
        return view('livewire.calendar-event-list', [
            'events' => $events,
        ]);
    }
}
