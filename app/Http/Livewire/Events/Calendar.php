<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
    public $currentEvents = [];

    public function mount()
    {
        $this->currentEvents = Event::query()
            ->whereMonth('event_date', date('m'))
            ->whereYear('event_date', date('Y'))
            ->get();
    }

    public function getCurrentMonthEvents(int $month, int $year)
    {
        $this->currentEvents = Event::query()
            ->whereMonth('event_date', $month + 1 ?? date('m'))
            ->whereYear('event_date', $year ?? date('Y'))
            ->get();
    }

    public function render()
    {
        return view('livewire.events.calendar', [
            'events' => Event::get()->transform(fn($event) => [
                'event_title' => $event->event_name,
                'event_date' => $event->event_date,
                'event_venue' => $event->event_venue,
                'event_time' => $event->event_time,
            ])
        ]);
    }
}
