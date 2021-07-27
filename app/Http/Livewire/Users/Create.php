<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\Traits\WithFormFieldValidate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use WithFormFieldValidate;

    public $name;
    public $email;
    public $role = "";

    public function getRolesProperty() 
    {
        return Role::pluck('name', 'id');
    }

    public function save() 
    {
        // $this->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email', 'unique:users'],
        //     'role' => ['required'],
        // ]);

        $validatedData = $this->formValidate($this->formFields());

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt('secret')
        ]);

        $user->assignRole($validatedData['role']);

        $this->reset();
        $this->bannerMessage('User created');
    }

    public function formFields()
    {
        return [
            [
                "label" => "Name",
                "width" => "auto",
                "type" => "text",
                "validation_rules" => ["required"],
                // "validation_messages" => [
                //     'name.required' => 'Name is required'
                // ],
                // "validation_attribute" => 'hello_applicant',
                "name" => "name"
            ],

            [
                "width" => "auto",
                "type" => "email",
                "validation_rules" => ["required", "email", "unique:users"],
                "name" => "email"
            ],

            [
                "width" => "auto",
                "type" => "select",
                "validation_rules" => ["required"],
                "name" => "role",
                "options" => $this->roles
            ]
        ];
    }

    public function render()
    {
        return view('livewire.users.create');
    }
}
