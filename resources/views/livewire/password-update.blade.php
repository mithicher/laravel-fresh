<div>
    <x-card-form form-action="changePassword">
        <x-slot name="title">Create New Password</x-slot>
        <x-slot name="description">Ensure your account is using a long, random password to stay secure. Your new password must be different from previous used passwords.</x-slot>
    
        <x-input 
            type="password" 
            label="Current Password" 
            name="current_password"
            wire:model.lazy="current_password" 
        />

        <x-input-password
            label="New Password" 
            name="password" 
            wire:model.defer="password"
            hint="Must be atleast 8 characters."
        />

        <x-input
            type="password"
            label="Confirm New Password" 
            name="password_confirmation" 
            wire:model.defer="password_confirmation" 
            hint="Both password must match."
        />  

        @if (session('success'))
            <div class="mb-4">
                @include('partials.flash')
            </div>
        @endif

        <x-slot name="footer">
            <div class="mr-4">
                <x-inline-toastr on="saved">Saved.</x-inline-toastr>
            </div>

            <x-button
                color="black"
                with-spinner
                wire:target="changePassword"
            >Save</x-button>
        </x-slot>
    </x-card-form>
</div>
