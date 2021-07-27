@props([
	'color' => 'indigo',
	'tag' => 'button',
	'withSpinner' => false
])

@php
	$themeClasses = [
		'indigo' => 'bg-indigo-600 border-transparent hover:bg-indigo-700 text-white focus:ring-indigo-500',
		'black' => 'bg-gray-700 border-transparent hover:bg-gray-800 text-white focus:ring-gray-500',
		'white' => 'border-gray-300 bg-white text-gray-500 hover:bg-gray-50 focus:ring-indigo-500',
		'red' => 'bg-red-600 border-transparent hover:bg-red-500 text-white focus:ring-red-500',
	][$color];
@endphp

<{{ $tag }}
	{{ $attributes->merge([
		'class' => $themeClasses . ' transition duration-300 ease-in-out inline-flex items-center justify-center py-2 px-4 border shadow-sm text-sm font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed' 
	]) }}

	wire:loading.attr="disabled"

	@if ($withSpinner)
    	wire:loading.class="base-spinner cursor-not-allowed opacity-75" 
	@endif
>	
	{{ $slot }}
</{{ $tag }}>
