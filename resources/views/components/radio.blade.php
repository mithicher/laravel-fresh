@props([
	'theme' => 'indigo',
	'id' => null,
	'name' => null,
	'label' => null,
	'checked' => false,
])

@php
	$themeColors = [
		'indigo' => 'text-indigo-600 focus:ring-indigo-500',
		'green' => 'text-green-600 focus:ring-green-500',
		'blue' => 'text-blue-600 focus:ring-blue-500',
	][$theme];
@endphp

<div class="flex items-center">
	<input 
		id="{{ $id }}"
		type="radio" 
		name="{{ $name }}"
		
		{{
			$attributes->merge([
				'class' => 'form-radio focus:outline-none border-gray-300 h-4 w-4 ' . $themeColors,

			])
		}}
		 
		@if ($attributes->has('wire:model'))
			{{ $attributes->whereStartsWith('wire:model') }}
		@endif

		@if ($checked)
			checked
		@endif
	>
	<label for="{{ $id }}" class="ml-3 block text-sm font-medium text-gray-700">{{ $label ?? $slot }}</label>
</div>