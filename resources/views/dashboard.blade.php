<x-app-layout title="Home">

    <x-slot name="topbar">
        <x-navbar-top>
            <x-slot name="title">Home</x-slot>
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </x-section-centered>
</x-app-layout>
