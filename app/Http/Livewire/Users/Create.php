<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Rules\CheckValidPhoneNumber;

class Create extends Component
{
    public $name;
    public $email;
    public $role = "";
    public $gender = "male";
    public $phone;

    public function getRolesProperty() 
    {
        return Role::pluck('name', 'id');
    }

    public function save() 
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'phone' => ['required', 'min:10', 'max:10', new CheckValidPhoneNumber],
            'email' => ['required', 'email', 'unique:users'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'gender' => $validatedData['gender'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt('secret')
        ]);

        $user->assignRole($validatedData['role']);

        $this->reset();
        $this->bannerMessage('User created');
    }

    public function render()
    {
        return view('livewire.users.create');
    }
}
