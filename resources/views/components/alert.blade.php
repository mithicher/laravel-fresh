
@props(['variant' => 'info', 'close' => true, 'icon' => true])

@php
$alertClass = [
	'info' => 'bg-blue-50 text-blue-800 border border-blue-200',
	'success' => 'bg-green-50 text-green-800 border border-green-200',
	'error' => 'bg-red-50 text-red-800 border border-red-200',
	'warning' => 'bg-yellow-50 text-yellow-800 border border-yellow-200'
]	
@endphp

<div 
	x-data="{ open: true }" 
	x-cloak 
	x-show="open" 
	x-transition:enter="transition ease-out delay-1000 duration-300"
	x-transition:enter-start="opacity-0"
	x-transition:enter-end="opacity-100"
	x-transition:leave="transition ease-in duration-100"
	x-transition:leave-start="opacity-100"
	x-transition:leave-end="opacity-0">
	<div
		{{
			$attributes->merge([
				"class" => "w-full relative flex px-4 py-3 rounded-lg ". $alertClass[$variant]
			])
		}}
		role="alert">
		@if($icon)
			<div class="flex-shrink-0 mr-3">
				@if($variant == 'info')   
					<svg class="w-6 h-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				@endif
				@if($variant == 'warning')   
					<svg class="w-6 h-6 text-yellow-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				@endif
				@if($variant == 'success')   
					<svg class="w-6 h-6 text-green-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
				@endif
				@if($variant == 'error')   
					<svg class="w-6 h-6 text-red-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
				@endif
			</div>
		@endif

		<div class="flex-1">
			{{ $slot }}
		</div>

		@if($close)
			<button class="focus:outline-none focus:shadow-outline ml-4 w-6 h-6 inline-flex rounded-full hover:bg-transparent" x-on:click="open = false">
				<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
					<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
					</path>
				</svg>
			</button>
		@endif
	</div>
		
</div>
