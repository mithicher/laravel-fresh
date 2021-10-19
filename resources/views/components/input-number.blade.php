@props([
	'id' => null,
	'label' => null,
	'name' => null,
	'hint' => null,
	'withErrorMessage' => true,
	'errorMessageFor' => null,
	'optional' => false,
	'noMargin' => false,
	'appendAfter' => null,
	'appendBefore' => null,
	'readonly' => false,
	'disabled' => false,
	'type' => 'text'
])

@php
	$errorClass = $errors->has($name) ? 'border-red-300' : 'border-gray-300';
	$readonlyClass = $readonly ? 'bg-gray-50' : 'bg-white';
@endphp

<div class="{{ $noMargin ? 'mb-0' :  'mb-5' }}">	
    @if($label)
		<x-label class="mb-1" for="{{ $name }}" :optional="$optional">{{ $label }}</x-label>
    @endif

    <div>
		<div class="relative">
			@isset($appendBefore)
				<span class="select-none text-gray-400 absolute top-0 left-0 text-sm leading-5 font-medium pl-3 inline-flex h-full items-center">{!! $appendBefore !!}</span>
			@endisset

			<input
				x-data
				x-init="new Cleave($el, { numeral: true, numeralThousandsGroupStyle: 'none', numeralPositiveOnly: true })" 
				x-cloak

				id="{{ $id ?? $name }}" 
				type="{{ $type }}"
				name="{{ $name }}"

				{{ $readonly ? 'readonly=readonly' : '' }}
				{{ $disabled ? 'disabled=disabled' : '' }}
	
				{{ $attributes->merge([
					'class' => 'form-input transition duration-150 ease-in-out px-3 py-2 block w-full text-gray-700 font-sans rounded-lg text-left focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 shadow-sm border sm:text-sm placeholder-gray-400 disabled:bg-gray-50 ' . $errorClass . ' ' . $readonlyClass
				]) }}

				@if ($attributes->has('wire:model'))
					{{ $attributes->whereStartsWith('wire:model') }}
				@endif
			/>	

			@isset($appendAfter)
				<span class="select-none text-gray-400 absolute top-0 right-0 text-sm leading-5 font-medium pr-3 inline-flex h-full items-center">{!! $appendAfter !!}</span>
			@endisset
		</div>

		@if($withErrorMessage)
			<x-input-error for="{{ $errorMessageFor ?? $name }}" class="mt-2" />
		@endif

		@isset($hint)
			<x-text-hint class="mt-2">{{ $hint }}</x-text-hint>
		@endisset
    </div>
</div>

@once
	@push('scripts')
		<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
	@endpush
@endonce
