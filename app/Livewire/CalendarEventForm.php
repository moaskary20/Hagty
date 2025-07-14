<?php

namespace App\Livewire;

use Livewire\Component;

class CalendarEventForm extends Component
{
    public $name;
    public $date;
    public $destination;
    public $status;
    public $eventId = null;

    protected $listeners = ['editEvent' => 'loadEvent'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'date' => 'required|date',
        'destination' => 'required|string|max:255',
        'status' => 'required|string',
    ];

    public function loadEvent($id)
    {
        $event = \App\Models\CalendarEvent::find($id);
        if ($event) {
            $this->eventId = $event->id;
            $this->name = $event->name;
            $this->date = $event->date;
            $this->destination = $event->destination;
            $this->status = $event->status;
        }
    }

    public function save()
    {
        $this->validate();
        if ($this->eventId) {
            $event = \App\Models\CalendarEvent::find($this->eventId);
            if ($event) {
                $event->update([
                    'name' => $this->name,
                    'date' => $this->date,
                    'destination' => $this->destination,
                    'status' => $this->status,
                ]);
                session()->flash('message', 'تم تحديث الفعالية بنجاح');
            }
        } else {
            \App\Models\CalendarEvent::create([
                'name' => $this->name,
                'date' => $this->date,
                'destination' => $this->destination,
                'status' => $this->status,
            ]);
            session()->flash('message', 'تم حفظ الفعالية بنجاح');
        }
        $this->reset(['name', 'date', 'destination', 'status', 'eventId']);
        $this->dispatch('eventSaved');
    }

    public function render()
    {
        return view('livewire.calendar-event-form');
    }
}
