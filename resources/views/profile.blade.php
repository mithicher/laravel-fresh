<x-app-layout title="Profile">
    
    <x-slot name="topbar">
        <x-navbar-top>
            <x-slot name="title">Profile</x-slot>
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
        <div class="mb-10">
            <livewire:profile-update />
        </div>

        <div class="mb-6">
            <livewire:password-update />
        </div>
    </x-section-centered>
</x-app-layout>
