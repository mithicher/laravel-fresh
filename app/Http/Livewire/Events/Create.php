<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use App\Traits\InteractsWithBanner;
use Livewire\Component;

class Create extends Component
{
    use InteractsWithBanner;

    public $event_name;
    public $event_venue;
    public $event_date;
    public $event_time = '';

    public function save()
    {
        $this->validate([
            'event_name' => ['required'],
            'event_venue' => ['required'],
            'event_date' => ['required', 'date:Y-m-d'],
            'event_time' => ['nullable'],
        ]);

        Event::create([
            'user_id' => auth()->id(),
            'event_name' => $this->event_name,
            'event_venue' => $this->event_venue,
            'event_date' => $this->event_date,
            'event_time' => $this->event_time ?? null,
        ]);

        $this->reset();
        $this->bannerMessage('Event created');
    }

    public function render()
    {
        return view('livewire.events.create');
    }
}
