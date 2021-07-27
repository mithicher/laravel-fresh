<?php

namespace App\Http\Livewire\Roles;

use App\Http\Livewire\Modal;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Services\RolePermissionService;
use Spatie\Permission\Models\Permission;

class Edit extends Modal
{
    public $role;
    public $permissions = [];
    public $name;
    public $permissionName;

    public function mount(Role $role) 
    {
        $this->role = $role->load('permissions');
        $this->permissions = $this->role->permissions()->pluck('name')->all();
        $this->name = $this->role->name;
    }

    public function savePermissionName() 
    {
        $this->validate([
            'permissionName' => ['required', Rule::unique('permissions', 'name')]
        ]); 

        foreach(explode(',', $this->permissionName) as $p) {
            Permission::create([
                'name' => $p,
                'guard_name' => 'web'
            ]);
        }

        $this->bannerMessage('New permission added!');
        
        $this->permissionName = '';
        $this->closeModal();
        $this->emit('$refresh');
    }

    public function updateRole() 
    {
        // TODO: validate permissions if available
        $this->validate([
            'name' => ['required']
        ]);

        $this->role->update([
            'name'=> $this->name
        ]);

        $this->role->syncPermissions($this->permissions);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.roles.edit', [
            'allpermissions' => RolePermissionService::getAllPermissions()
        ]);
    }
}
