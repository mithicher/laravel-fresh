<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileButton extends Component
{
    protected $listeners = [
        'profileButtonRefresh' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.profile-button');
    }
}
