
@props(['variant' => 'info', 'close' => true, 'icon' => true])

@php
$alertClass = [
	'info' => 'bg-gradient-to-b from-blue-500 to-white',
	'success' => 'bg-gradient-to-b from-green-500 to-white',
	'error' => 'bg-gradient-to-b from-red-500 to-white',
	'warning' => 'bg-gradient-to-b from-yellow-500 to-white'
];
$alertTextClass = [
	'info' => 'text-blue-700',
	'success' => 'text-green-700',
	'error' => 'text-red-700',
	'warning' => 'text-yellow-700'
];
@endphp

<div 
	x-data="{ open: true }" 
	x-show="open" 
	x-transition:enter="transition ease-out delay-1000 duration-300"
	x-transition:enter-start="opacity-0"
	x-transition:enter-end="opacity-100"
	x-transition:leave="transition ease-in duration-100"
	x-transition:leave-start="opacity-100"
	x-transition:leave-end="opacity-0"
	x-cloak>
	<div
		{{
			$attributes->merge([
				"class" => "w-full relative pl-8 pr-4 py-4 rounded-lg bg-white shadow flex"
			])
		}}
		role="alert">
	 
		<div class="top-0 left-0 absolute w-2 h-full py-2 pl-2">
			<div class="rounded w-2 h-full flex-1 {{ $alertClass[$variant] }}"></div>
		</div>
	 
		<div class="flex-1 {{ $alertTextClass[$variant] }} pt-1">
			{{ $slot }}
		</div>

		@if($close)
			<button class="focus:outline-none focus:shadow-outline ml-4 w-8 h-8 inline-flex flex-shrink-0 items-center justify-center rounded-full hover:bg-gray-100" x-on:click="open = false">
				<svg class="w-5 h-5 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
					<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
					</path>
				</svg>
			</button>
		@endif
	</div>
</div>
