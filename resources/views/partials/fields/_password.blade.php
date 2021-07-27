<div class="{{ $field->width ?? 'col-span-full' }}">
	<x-input-password
		label="{{ $field->label ?? Str::replace('_', ' ', Str::title($field->name)) }}" 
		id="{{ $field->name }}" 
		name="{{ $field->name }}" 
		wire:model.defer="{{ $field->name }}"
	/>
</div>