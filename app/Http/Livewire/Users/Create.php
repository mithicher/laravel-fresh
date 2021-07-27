<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Rules\CheckValidPhoneNumber;
use App\Traits\WithFormFieldValidate;

class Create extends Component
{
    use WithFormFieldValidate;

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
        // $this->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email', 'unique:users'],
        //     'role' => ['required'],
        // ]);

        $validatedData = $this->formValidate($this->formFields());

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
            ],

            [
                "width" => "auto",
                "type" => "radio",
                "validation_rules" => ["required", Rule::in(['male', 'female'])],
                "name" => "gender",
                "initial_checked_value" => "male",
                "options" => [
                    'male' => 'Male',
                    'female' => 'Female'
                ]
            ],

            [
                "width" => "auto",
                "type" => "phone",
                "validation_rules" => ["required", new CheckValidPhoneNumber],
                "name" => "phone"
            ],

        ];
    }

    public function render()
    {
        return view('livewire.users.create');
    }
}
