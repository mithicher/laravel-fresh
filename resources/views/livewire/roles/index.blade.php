<div>
    <x-slot name="title">Roles</x-slot>

    <x-slot name="topbar">
        <x-navbar-top>
            <x-slot name="title">
                <x-breadcrumb>
                    <x-breadcrumb-item>Roles</x-breadcrumb-item>
                </x-breadcrumb>
            </x-slot>   
        
            <x-button type="button" color="black" x-data="{}" x-on:click="livewire.emit('show')">
                <x-iconic-plus class="stroke-current w-5 h-5 mr-1 -ml-2" />New Role
            </x-button>   
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
        @if($roles->isNotEmpty()) 
            <x-card no-padding>
                <x-table.table>
                    <thead>
                        <tr>
                            <x-table.thead>Role Name</x-table.thead>
                            <x-table.thead>Users</x-table.thead>
                            <x-table.thead>Guard Name</x-table.thead>
                            <x-table.thead>Created at</x-table.thead>
                            <x-table.thead>Last updated</x-table.thead>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <x-table.tdata class="md:w-2/5">
                                    <a href="{{ url('roles/' . $role->id) }}" class="text-indigo-500 font-medium block truncate">
                                        {{ Str::title(implode(' ', explode('-', $role->name))) }}
                                    </a>
                                </x-table.tdata>
                                <x-table.tdata class="w-20">
                                    {{ $role->users_count }}
                                </x-table.tdata>
                                <x-table.tdata class="w-20">
                                    {{ $role->guard_name }}
                                </x-table.tdata>
                                <x-table.tdata class="w-20">
                                    {{ $role->created_at->toFormattedDateString() }}
                                </x-table.tdata>
                                <x-table.tdata class="w-20">
                                    {{ $role->updated_at->toFormattedDateString() }}
                                </x-table.tdata>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-card>
        @else 
            <x-card-empty />
        @endif

        {{-- Role Modal --}}
        <x-dialog-modal max-width="lg" form-action="saveRoleName" wire:model="show">
                <x-slot name="title">Create new role</x-slot>
                
                <x-slot name="content">
                    <x-input
                        label="Name"
                        name="name"
                        wire:model.defer="name"
                        hint="Write the role's name in all lowercase letters, e.g. editor"
                    />
                </x-slot>
    
                <x-slot name="footer">
                    <x-button color="black" type="submit" wire:target="saveRoleName" with-spinner>Save</x-button>
                </x-slot>
            </x-dialog-modal>
    </x-section-centered>
</div>
