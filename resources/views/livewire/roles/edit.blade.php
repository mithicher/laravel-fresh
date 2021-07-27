<div>
    <x-slot name="title">Edit Role</x-slot>

    <x-slot name="topbar">
        <x-navbar-top>
            <x-slot name="title">
                <x-breadcrumb>
                    <x-breadcrumb-item href="{{ route('roles') }}">Roles</x-breadcrumb-item>
                    <x-breadcrumb-item>{{ Str::title($role->name) }}</x-breadcrumb-item>
                </x-breadcrumb>
            </x-slot>
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
        <x-card form-action="updateRole">
            <x-input
                label="Role Name"
                name="name"
                wire:model.defer="name"
            />

            <x-label for="permissions">Permissions associated with current role</x-label>
            <div class="flex flex-wrap -mx-4 mt-2">
                @foreach($allpermissions as $key => $permission)
                    <div class="mb-6 px-4 w-1/2 md:w-1/4">
                        <h3 class="font-bold text-gray-700 text-xs mb-1 uppercase tracking-wide">{{ $key }}</h3>
                        <div class="space-y-1">
                            @foreach($permission as $p)
                                <x-checkbox
                                    no-margin
                                    :withErrorMessage="false"
                                    label="{{ $p['label'] }}" 
                                    id="category.{{ $p['value'] }}"
                                    wire:model.defer="permissions"
                                    value="{{ $p['value'] }}"
                                />
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Permission Modal Trigger Button --}}
            <x-button type="button" color="white" x-data="{}" x-on:click="livewire.emit('show')" class="text-indigo-600 hover:text-indigo-700 font-medium">
                <x-iconic-plus class="-ml-2 w-5 h-5 stroke-current" />
                New Permissions
            </x-button>

            <x-slot name="footer">
                <div class="flex justify-end items-center">
                    <div class="mr-4">
                        <x-inline-toastr on="saved">Saved.</x-inline-toastr>
                    </div>

                    <x-button color="black" type="submit" wire:target="updateRole" with-spinner>Update Role</x-button>
                </div>
            </x-slot>
        </x-card>

        {{-- Permission Modal --}}
        <x-dialog-modal wire:model.defer="show" form-action="savePermissionName">
            <x-slot name="title">Create new permission</x-slot>
            
            <x-slot name="content">
                <x-input
                    label="Permission Name"
                    name="permissionName"
                    wire:model.defer="permissionName"
                    hint="Add comma separated permission names  eg. view_users, edit_users, delete_users"
                />  
            </x-slot>

            <x-slot name="footer">
                <x-button type="submit" color="black" wire:target="savePermissionName" with-spinner>Save</x-button>
            </x-slot>
        </x-dialog-modal>
    </x-section-centered>
</div>
