<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20" />
            </a>
        </x-slot>

        <x-heading>Forgot your password?</x-heading>

        <div class="mt-1 mb-4 text-sm text-gray-500">
            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-form method="POST" action="{{ route('password.email') }}">
     
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button type="submit" color="black">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </x-form>
    </x-auth-card>
</x-guest-layout>
