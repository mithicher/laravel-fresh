<?php

namespace App\Services;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionService
{
	public static function getAllRolesWithPermissions() 
	{
		return Role::with('permissions')
    		->whereGuardName('web')
    		->get()
    		->mapToGroups(function ($role) {
            	return [
                    $role['name'] => $role->permissions()
                        ->pluck('name')
                        ->map(function ($permission) {
	                        return [
	                            'label' => implode(' ', explode('_', $permission)),
	                            'value' => $permission,
	                            'group' => count($e = explode('_', $permission)) > 2
	                                ? Str::title(sprintf('%s %s', $e[1], $e[2]))
	                                : Str::title($e[1])
	                        ];
	                    })
	                    ->groupBy('group')
                ];	
            })->toArray();
	}

	public static function getAllPermissions() 
	{
		return Permission::whereGuardName('web')
			->get()
			->map(function ($permission) {
	        	return [ 
	                'label' => implode(' ', explode('_', $permission->name)),
	                'value' => $permission->name,
	                'group' => count($e = explode('_', $permission->name)) > 2
	                    ? Str::title(sprintf('%s %s', $e[1], $e[2]))
	                    : Str::title($e[1])
	            ];
	        })
			->groupBy('group')
	        ->toArray();
	}

	public static function getAllPermissionsForRole($roleId) 
	{

		$role = Role::with('permissions')->find($roleId);

		return $role->permissions->map(function ($permission) {
        	return [ 
                'label' => implode(' ', explode('_', $permission->name)),
                'value' => $permission->name,
                'group' => count($e = explode('_', $permission->name)) > 2
                    ? Str::title(sprintf('%s %s', $e[1], $e[2]))
                    : Str::title($e[1])
            ];
        })
		->groupBy('group')
        ->toArray();
	}
}
