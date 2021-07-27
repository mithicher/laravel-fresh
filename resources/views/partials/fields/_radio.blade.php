<div class="{{ $field->width ?? 'col-span-full' }}">
	<div class="mb-5">
		<x-label for="radio" class="mb-1">{{ $field->label ?? Str::replace('_', ' ', Str::title($field->name)) }}</x-label>
		<div class="space-y-2">
			@foreach ($field->options as $optionKey => $optionValue)
				<x-radio 
					label="{{ Str::replace('_', ' ', Str::title($optionValue)) }}" 
					id="{{ $field->name }}-{{ $optionKey }}" 
					name="{{ $field->name }}" 
					value="{{ $optionKey }}"
					wire:model.defer="{{ $field->name }}"
					:checked="old($field->name, $field->initial_checked_value ?? '') === $optionKey"
				/>
			@endforeach
		</div>
		<x-input-error for="{{ $field->name }}" class="mt-1"/>
	</div>
</div>