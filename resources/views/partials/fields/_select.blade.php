<div class="{{ $field->width ?? 'col-span-full' }}">
	<x-select
		label="{{ $field->label ?? Str::replace('_', ' ', Str::title($field->name)) }}" 
		id="{{ $field->name }}" 
		name="{{ $field->name }}" 
		wire:model.defer="{{ $field->name }}" 
		class="{{ $field->class ?? '' }}"
	>
		<option value="" disabled selected>Select an option</option>
		@foreach ($field->options as $optionKey => $optionValue)
			<option value="{{ $optionKey }}">{{ Str::replace('_', ' ', Str::title($optionValue)) }}</option>
		@endforeach
	</x-select>
</div>