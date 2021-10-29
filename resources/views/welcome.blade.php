<x-guest-layout>
    @push('styles')
        <style>
            .pattern-grid-md {
                background-image: linear-gradient(currentColor 1px, transparent 1px), linear-gradient(to right, currentColor 1px, transparent 1px);
                background-size: 40px 40px;
            }
        </style>
    @endpush

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

        {{-- <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
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
        </div> --}}

        <div class="relative flex flex-col w-full max-w-6xl mx-auto overflow-hidden rounded-lg shadow-md" style="height: 500px">
            <div class="bg-white relative flex-1 w-full flex flex-col items-center justify-center">
                <div class="z-40 relative w-full">
                    <div class="flex items-center justify-start w-96 mx-auto">
                        <x-application-logo class="h-16" />
                        <div class="font-semibold text-5xl ml-4 tracking-tighter">Laravel Fresh</div>
                    </div>
                    <div class="text-sm tracking-wider font-medium uppercase text-gray-500 border-t mt-3 border-gray-300 text-center flex items-center">
                        <div class="bg-white px-4 inline-flex -mt-3 mx-auto">
                            A TALL stack admin panel starter
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mb-10 -ml-12 absolute bottom-0 left-0 hidden md:block">
                <div class="w-10 h-10 rounded-full bg-gray-100 border-8 border-gray-300 mb-10 ml-32"></div>
                <div class="w-24 h-24 rounded-full bg-gray-300 mb-10 ml-4 p-6">
                    <div class="w-12 h-12 rounded-full bg-gray-100"></div>
                </div>
                <div class="w-10 h-20 transform skew-y-12 bg-gray-300 -mb-4 ml-32 relative z-40"></div>
                <div class="z-30 w-64 h-64 text-gray-300 pattern-grid-md"></div>
            </div>

            <div class="-mt-12 -mr-12 absolute top-0 right-0 transform rotate-180 hidden md:block">
                <div class="w-10 h-10 rounded-full bg-gray-100 border-8 border-gray-300 mb-10 ml-32"></div>
                <div class="w-24 h-24 rounded-full bg-gray-300 mb-10 mr-4 p-6">
                    <div class="w-12 h-12 rounded-full bg-gray-100"></div>
                </div>
                <div class="w-10 h-20 transform skew-y-12 bg-gray-300 -mb-4 ml-32"></div>
                <div class="z-30 w-64 h-64 text-gray-300 pattern-grid-md"></div>
            </div>
        </div>
    </div>
</x-guest-layout>
