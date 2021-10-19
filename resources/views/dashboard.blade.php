<x-app-layout title="Home">

    <x-slot name="topbar">
        <div class="bg-purple-700 text-purple-200 py-2 px-4 text-center text-sm">
            Some new components added and bug fixes done.
        </div>
        <x-navbar-top>
            <x-slot name="title">Home</x-slot>
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
        <x-heading class="mb-1" size="xl">Grid</x-heading>
        <x-grid mobile="1" tablet="2" laptop="3" desktop="3" gap="6">
            <div class="h-16 bg-white shadow rounded-lg"></div>
            <div class="h-16 bg-white shadow rounded-lg"></div>
            <div class="h-16 bg-white shadow rounded-lg"></div>
        </x-grid>

        <br><br>
        <x-heading class="mb-1" size="xl">QrCode</x-heading>
        <x-qrcode data="Welcome to Laravel Fresh" />

        <br><br>
        <x-heading class="mb-1" size="xl">Alertbox</x-heading>
        <x-alertbox>This is a new alertbox.</x-alertbox>
        <br>
        <x-alertbox variant="error">Something went wrong. Please try again later.</x-alertbox>
        <br>
        <x-alertbox variant="success">
            <strong class="block">Success</strong>
            You've changed your password successfully. Please login with the new password next time.
        </x-alertbox>
        
    </x-section-centered>
</x-app-layout>
