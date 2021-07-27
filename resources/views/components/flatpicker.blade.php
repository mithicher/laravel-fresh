@props([
	'defaultValue' => null,
	'enableTime' => false,
    'dateFormat' => 'Y-m-d',
    'noCalendar' => false,
    'theme' => 'airbnb',
	'id' => null,
	'label' => null,
	'name' => null,
	'hint' => null,
	'withErrorMessage' => true,
	'errorMessageFor' => null,
	'optional' => false,
	'noMargin' => false,
	'readonly' => false
])

@php
$errorClass = $errors->has($name) ? 'border-red-300' : 'border-gray-300';
$readonlyClass = $readonly ? 'bg-gray-100' : 'bg-white';

$options = [
	'dateFormat' =>  $dateFormat,
	'defaultDate' => $defaultValue ?? now(),
	'altInput' => $enableTime == false ? true : false,
	'altFormat' => $enableTime == false ? 'F j, Y' : '',

	'enableTime' => $enableTime,
	'noCalendar' => $noCalendar,
];
@endphp

<div class="{{ $noMargin ? 'mb-0' : 'mb-5' }}">
	@if($label)
		<x-label class="mb-1" for="{{ $name }}" :optional="$optional">{{ $label }}</x-label>
    @endif

	<div
		class="relative"
		x-data
		x-init='
			fp = flatpickr($refs.input, @json($options));
			fp.onChange = (selectedDates, dateStr, instance) => {
		        $refs.input.value = dateStr
		    }
		'
		x-cloak
		wire:ignore
	>
		<input 
			type="text" 
			x-ref="input" 
			
			{{ $attributes->merge([
				'class' => 'form-input transition duration-150 ease-in-out pl-3 pr-4 py-2 block w-full text-gray-700 font-sans rounded-lg text-left focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 shadow-sm border sm:text-sm placeholder-gray-400 ' . $errorClass . ' ' . $readonlyClass
			]) }}

			@if ($attributes->has('wire:model'))
				{{ $attributes->whereStartsWith('wire:model') }}
			@endif
		>

		<div class="select-none absolute top-0 right-0 h-full mr-2 flex items-center justify-center bg-transparent">
			<svg class="w-6 h-6 stroke-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.75 8.75C4.75 7.64543 5.64543 6.75 6.75 6.75H17.25C18.3546 6.75 19.25 7.64543 19.25 8.75V17.25C19.25 18.3546 18.3546 19.25 17.25 19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V8.75Z"></path>
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 4.75V8.25"></path>
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 4.75V8.25"></path>
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.75 10.75H16.25"></path>
			  </svg>
		</div>
	</div>

 
	@if($withErrorMessage)
		<x-input-error for="{{ $errorMessageFor ?? $name }}" class="mt-2" />
	@endif

	@isset($hint)
		<x-text-hint class="mt-2">{{ $hint }}</x-text-hint>
	@endisset
</div>

@once
	@push('styles')
		@if ($theme === 'airbnb')
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/themes/airbnb.css">
		@else
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
		@endif
		<style>
			.flatpickr-day.selected,
			.flatpickr-day.startRange,
			.flatpickr-day.endRange,
			.flatpickr-day.selected.inRange,
			.flatpickr-day.startRange.inRange,
			.flatpickr-day.endRange.inRange,
			.flatpickr-day.selected:focus,
			.flatpickr-day.startRange:focus,
			.flatpickr-day.endRange:focus,
			.flatpickr-day.selected:hover,
			.flatpickr-day.startRange:hover,
			.flatpickr-day.endRange:hover,
			.flatpickr-day.selected.prevMonthDay,
			.flatpickr-day.startRange.prevMonthDay,
			.flatpickr-day.endRange.prevMonthDay,
			.flatpickr-day.selected.nextMonthDay,
			.flatpickr-day.startRange.nextMonthDay,
			.flatpickr-day.endRange.nextMonthDay {
				background: #6366F1;
				border-color: #6366F1;
			}
		</style>
	@endpush

	@push('scripts')
		<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
	@endpush
@endonce