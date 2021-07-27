<div class="{{ $field->width ?? 'col-span-full' }}">
	<x-filepond
		label="{{ $field->label ?? Str::replace('_', ' ', Str::title($field->name)) }}" 
		id="{{ $field->name }}" 
		name="{{ $field->name }}" 
		wire:model="{{ $field->name }}"
		:extra-attributes="json_decode(json_encode($field->attributes), true) ?? []"
	/>
</div>