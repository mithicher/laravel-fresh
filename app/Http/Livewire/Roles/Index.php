<?php

namespace App\Http\Livewire\Roles;

use App\Http\Livewire\Modal;
use App\Traits\InteractsWithBanner;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class Index extends Modal
{
    use InteractsWithBanner;

    public $name;
     
    public function saveRoleName() 
    {
        $this->validate([
            'name' => ['required', Rule::unique('roles')]
        ]);

        Role::create([
            'name' => $this->name,
            'guard_name' => 'web'
        ]);

        $this->bannerMessage('New role added!');

        $this->emit('$refresh');
        
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.roles.index', [
            'roles' => Role::withCount('users')
                            ->whereGuardName('web')
                            ->orderBy('name')
                            ->get()
        ]);
    }
}
