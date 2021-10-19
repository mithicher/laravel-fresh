@props([
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

<div class="{{ $noMargin ? 'mb-0' : 'mb-5' }}">
	@if($label)
		<x-label class="mb-1" for="{{ $name }}" :optional="$optional">{{ $label }}</x-label>
    @endif

	<div 
		x-data="{ 
			focused: false,
			resizeTextarea (event) {
				event.target.style.height = 'auto'
				event.target.style.height = (event.target.scrollHeight) + 'px'
			},
			init() {
				this.$nextTick(() => {
					this.$refs.input.setAttribute('style', 'height:' + (this.$refs.input.scrollHeight) + 'px;overflow-y:hidden;')
				})
			}
		}"
			
		:class="{ 'outline-none border-indigo-500 ring-1 ring-indigo-500': focused === true }" 
		class="form-textarea bg-white relative leading-none transition duration-150 ease-in-out px-3 py-2 block w-full text-gray-700 font-sans rounded-lg text-left shadow-sm border sm:text-sm placeholder-gray-400 {{ $errors->has($name) ? ' border-red-300 ' : ' border-gray-300 ' }}"
	>
		<textarea 
			wire:ignore 
			x-ref="input"
			x-on:focus="focused = true" 
			x-on:blur="focused = false" 

			x-on:input="resizeTextarea"
			
			id="{{ $id ?? $name }}" 
			name="{{ $name }}"
			autocomplete="off" 
			class="resize-none border-0 focus:ring-0 p-0 bg-transparent w-full focus:outline-none overflow-hidden"
			
			@if ($attributes->has('wire:model'))
				{{ $attributes->whereStartsWith('wire:model') }}
			@endif

			{{ $attributes }}
		>{{ old($name, $value ?? '') }}</textarea>
	</div>

	@if($withErrorMessage)
		<x-input-error for="{{ $errorMessageFor ?? $name }}" class="mt-2" />
	@endif

	@isset($hint)
		<x-text-hint class="mt-2">{{ $hint }}</x-text-hint>
	@endisset
</div>