<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="mb-2">
                <a href="/">
                    <x-application-logo class="mx-auto w-20 h-20" />
                </a>       
            </div>
        </x-slot>

        <x-heading class="mb-4">Login to get started.</x-heading>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-form method="POST" action="{{ route('login') }}">

            <!-- Email Address -->
            <div>
                <x-label class="mb-1" for="email" :value="__('Email')" />
                <x-input id="email" type="email" name="email" class="w-full" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <div class="flex justify-between">
                    <x-label for="password" :value="__('Password')" />
    
                    @if (Route::has('password.request'))
                        <div class="mb-1.5">
                            <a tabindex="3" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif
                </div>

                <x-input-password id="password"
                                type="password"
                                name="password"
                                class="w-full"
                                required autocomplete="current-password" />
            </div>

      
            <x-button type="submit" class="w-full mt-2" color="black">
                {{ __('Log in') }}
            </x-button>
        </x-form>

        <x-slot name="footer">
            <div class="space-x-3 flex mt-5 text-sm">
                <a href="{{ url('/') }}" class="text-gray-500 underline">Back to home</a>
                <div class="text-gray-400">/</div>
                <a href="#" class="text-gray-500 underline">Contact us</a>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>
