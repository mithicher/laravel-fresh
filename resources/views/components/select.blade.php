@props([
	'id' => md5(Str::random(6)),
	'label' => null,
	'hint' => null,
	'name' => null,
	'errorMessageFor' => null,
	'optional' => false,
	'withErrorMessage' => true,
	'noMargin' => false,
	'readonly' => false,
])

@php
	$errorClass = $errors->has($name) ? 'border-red-300' : 'border-gray-300';
@endphp

<div class="{{ $noMargin ? 'mb-0' :  'mb-5' }}">
	@if(isset($label))
		<x-label class="mb-1" for="{{ $name }}" :optional="$optional">{{ $label }}</x-label>
    @endif

	<select
		id="{{ $id ?? $name }}"
		name="{{ $name }}"
		{{
			$attributes->merge([
				'class' => 'form-select transition duration-150 ease-in-out px-3 py-2 block w-full text-gray-700 font-sans rounded-lg text-left focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 shadow-sm border sm:text-sm placeholder-gray-400 bg-white disabled:bg-gray-100 ' . $errorClass
			])
		}}
		
		@if ($attributes->has('wire:model'))
			{{ $attributes->whereStartsWith('wire:model') }}
		@endif
	>
		{{ $slot }}
	</select>

	@if ($withErrorMessage)
		<x-input-error class="mt-2" for="{{ $errorMessageFor ?? $name }}" />
	@endif

	@isset($hint)
		<x-text-hint class="mt-2">{{ $hint }}</x-text-hint>
	@endisset
</div>
