<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;

    protected $listeners = [
        'show' => 'show'
    ];

    public function show()
    {
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->show = false;
    }
}
