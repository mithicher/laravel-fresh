<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Rules\CheckCurrentPassword;

class PasswordUpdate extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updatedCurrentPassword() 
    {
        $this->validate([
            'current_password' => ['required', new CheckCurrentPassword]
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => ['required', new CheckCurrentPassword],
            'password' => 'required|min:8|confirmed'
        ]);

        auth()->user()->update([
            'password' => bcrypt($this->password)
        ]);

        $this->notify('Password has been changed successfully.');

        $this->reset();
    
        $this->emitSelf('saved');
        $this->emitSelf('$refresh');
    }

    public function render()
    {
        return view('livewire.password-update');
    }
}
