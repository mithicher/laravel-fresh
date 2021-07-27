<div>
    <x-slot name="title">Edit User</x-slot>

    <x-slot name="topbar">
        <x-navbar-top>
            <x-slot name="title">
                <x-breadcrumb>
                    <x-breadcrumb-item href="{{ route('users') }}">Users</x-breadcrumb-item>
                    <x-breadcrumb-item>Edit User - {{ $name }}</x-breadcrumb-item>
                </x-breadcrumb>
            </x-slot>
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
       
        <x-card-form form-action="update">
            <x-slot name="title">Edit User</x-slot>
 
            <x-input
                label="Name" 
                name="name"
                wire:model.defer="name" 
            />
            
            <x-input
                type="email"
                label="Email" 
                name="email"
                wire:model.defer="email" 
            />

            <x-select label="Role" name="role" wire:model.defer="role">
                <option value="" disabled selected>Select a role</option>
                @foreach($this->roles as $roleKey => $roleValue)
                    <option value="{{ $roleKey }}">{{ Str::title($roleValue) }}</option>
                @endforeach
            </x-select>
     
            <x-slot name="footer">
                <div class="mr-4">
                    <x-inline-toastr on="saved">Saved.</x-inline-toastr>
                </div>

                <x-button
                    color="black"
                    with-spinner
                    wire:target="update"
                >Save</x-button>
            </x-slot>
        </x-card-form>
       
    </x-section-centered>
</div>
