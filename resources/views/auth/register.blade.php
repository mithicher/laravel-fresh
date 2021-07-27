<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20" />
            </a>
        </x-slot>

        <div>
            Already registered?
            <a class="underline text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Login here') }}
            </a> 
        </div>
        
        <hr class="my-4">

        <x-form method="POST" action="{{ route('register') }}">
           
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

           
            <x-button class="mt-4 w-full" color="black">
                {{ __('Register') }}
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
