<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $name;
    public $email;
    public $role = '';

    public $user;

    public function mount(User $user) 
    {
        $this->user =$user->load('roles');

        $this->name = $this->user->name;
        $this->email = $this->user->email;

        $this->role = $this->user->roles()->pluck('id')[0] ?? '';
    }

    public function update() 
    {
        $this->validate([
            'name' => ['required'],
            'email' => [
                'required', 
                'email', 
                Rule::unique('users')->ignore($this->user->id),
            ],
            'role' => ['required'],
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email
        ]);

        // All current roles will be removed from the user and replaced by the array given
        $this->user->syncRoles($this->role);

        $this->user->refresh();

        $this->bannerMessage('User created');
    }

    public function getRolesProperty() 
    {
        return Role::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
