<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-50 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 justify-start sm:pt-0">
                <x-application-logo class="h-16" />
                <div class="font-semibold text-5xl ml-4 tracking-tighter">Laravel Fresh</div>
            </div>

            <div class="mt-4 text-gray-500 text-center">
                A TALL stack admin panel starter.
            </div>
            <div class="flex space-x-3 text-gray-500 justify-center mt-2 sm:items-center">
                <a href="https://twitter.com/mithicher" class="border-b border-gray-200 leading-none flex items-center" target="_blank">
                    @mithicher
                </a>
                <div class="ml-4">/</div>  
                <a href="https://github.com/mithicher/laravel-fresh" class="border-b border-gray-200 leading-none flex items-center" target="_blank">
                    View on Github
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
