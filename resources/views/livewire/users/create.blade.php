<div>
    <x-slot name="title">New User</x-slot>

    <x-slot name="topbar">
        <x-navbar-top>
            <x-slot name="title">
                <x-breadcrumb>
                    <x-breadcrumb-item href="{{ route('users') }}">Users</x-breadcrumb-item>
                    <x-breadcrumb-item>New User</x-breadcrumb-item>
                </x-breadcrumb>
            </x-slot>
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
        <x-card-form form-action="save">
            <x-slot name="title">Create New User</x-slot>
            <x-slot name="description">Add a new user with role.</x-slot>
 
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

            <div class="mb-5">
                <x-label for="gender" class="mb-1">Gender</x-label>
                <div class="space-y-2">
                    <x-radio 
                        label="Male" 
                        id="Male" 
                        name="gender" 
                        value="male"
                        wire:model.defer="gender"
                    />
                    <x-radio 
                        label="Female" 
                        id="Female" 
                        name="gender" 
                        value="female"
                        wire:model.defer="gender"
                    />
                </div>
                <x-input-error for="gender" class="mt-1"/>
            </div>
            
            <x-input-number
                label="Phone" 
                id="phone" 
                name="phone" 
                wire:model.defer="phone"
                maxlength="10"
                minlength="10"
            />
    
            <x-slot name="footer">
                <div class="mr-4">
                    <x-inline-toastr on="saved">Saved.</x-inline-toastr>
                </div>

                <x-button
                    color="black"
                    with-spinner
                    wire:target="save"
                >Save</x-button>
            </x-slot>
        </x-card-form>
       
    </x-section-centered>
</div>
