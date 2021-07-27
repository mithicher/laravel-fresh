<x-guest-layout>
	<x-slot name="title">@yield('title')</x-slot>

	<div class="flex min-h-screen bg-white items-center">
		<div class="w-full md:flex md:max-w-2xl m-8 md:mx-auto justify-center">
			<div>
				<div class="text-indigo-600 text-5xl md:text-6xl font-bold">
					@yield('code', __('Oh no'))
				</div>
			</div>
		 
			<div class="flex-shrink-0 w-16 md:w-0.5 h-0.5 md:h-16 bg-gray-200 my-6 md:my-0 md:mx-6"></div>

			<div>
				<p class="text-gray-500 text-2xl md:text-3xl font-light mb-3 leading-normal">
					@yield('message')
				</p>

				<a class="py-2 px-1 font-medium text-indigo-600" href="{{ app('router')->has('home') ? route('home') : url('/') }}">
						{{ __('Go back home') }} &rarr;
				</a>
			</div>
		</div>
	</div>
</x-guest-layout>