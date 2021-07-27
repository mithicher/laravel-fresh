<div class="{{ $field->width ?? 'col-span-full' }}">
	<x-input-number
		label="{{ $field->label ?? Str::replace('_', ' ', Str::title($field->name)) }}" 
		id="{{ $field->name }}" 
		name="{{ $field->name }}" 
		wire:model.defer="{{ $field->name }}" 

		append-after="{{ $field->append_after ?? '' }}" 
		class="{{ $field->class ?? '' }}"
	/>
</div>