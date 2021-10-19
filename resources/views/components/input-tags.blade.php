@props([
	'id' => null,
	'label' => null,
	'name' => null,
	'hint' => null,
	'type' => 'text',
	'withErrorMessage' => true,
	'errorMessageFor' => null,
	'optional' => false,
	'noMargin' => false,
	'readonly' => false,
	'placeholder' => 'Enter some tags'
])

@php
$errorClass = $errors->has($name) ? 'border-red-300' : 'border-gray-300';
$readonlyClass = $readonly ? 'bg-gray-50' : 'bg-white';
@endphp

<div class="{{ $noMargin ? 'mb-0' : 'mb-5' }}">
	@if($label)
		<x-label class="mb-1" for="{{ $name }}" :optional="$optional">{{ $label }}</x-label>
	@endif

	<div x-data="tagSelect" x-on:click.outside="clearSearch()" x-on:keydown.escape="clearSearch()">
		<div class="relative" x-on:keydown.enter.prevent="addTag(textInput)">
			<input id="{{ $id ?? $name }}" type="{{ $type }}" name="{{ $name }}" x-model="textInput" x-ref="textInput"
				x-on:input="search($event.target.value)"
				class="form-input transition duration-150 ease-in-out px-3 py-2 block w-full text-gray-700 font-sans rounded-lg text-left focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 shadow-sm border sm:text-sm placeholder-gray-400 {{ $errorClass }} {{ $readonlyClass }}"
				placeholder="{{ $placeholder }}">

			<div :class="[open ? 'block' : 'hidden']">
				<div class="absolute z-40 left-0 mt-2 w-full">
					<div class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
						<a x-on:click.prevent="addTag(textInput)"
							class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white">Add tag "<span
								class="font-semibold" x-text="textInput"></span>"</a>
					</div>
				</div>
			</div>

			<template x-for="(tag, index) in tags">
				<div class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1">
					<span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
					<button type="button" x-on:click.prevent="removeTag(index)"
						class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
						<svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 24 24">
							<path fill-rule="evenodd"
								d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
						</svg>
					</button>
				</div>
			</template>
		</div>
	</div>

	@if($withErrorMessage)
		<x-input-error for="{{ $errorMessageFor ?? $name }}" class="mt-2" />
	@endif

	@isset($hint)
		<x-text-hint class="mt-2">{{ $hint }}</x-text-hint>
	@endisset
</div>


<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('tagSelect', () => ({
      		open: false,
      		textInput: '',
      		tags: @entangle($attributes->wire('model')),
			addTag(tag) {
				tag = tag.trim()
				if (tag != "" && !this.hasTag(tag)) {
				this.tags.push( tag )
				}
				this.clearSearch()
				this.$refs.textInput.focus()
				this.fireTagsUpdateEvent()
			},
			fireTagsUpdateEvent() {
				this.$el.dispatchEvent(new CustomEvent('tags-update', {
				detail: { tags: this.tags },
				bubbles: true,
				}));
			},
			hasTag(tag) {
				var tag = this.tags.find(e => {
				return e.toLowerCase() === tag.toLowerCase()
				})
				return tag != undefined
			},
			removeTag(index) {
				this.tags.splice(index, 1)
				this.fireTagsUpdateEvent()
			},
			search(q) {
				if (q.includes(",")) {
					q.split(",").forEach(function(val) {
						this.addTag(val)
					}, this)
				}
				this.toggleSearch()
			},
			clearSearch() {
				this.textInput = ''
				this.toggleSearch()
			},
			toggleSearch() {
				this.open = this.textInput != ''
			}
		}))
	})
</script>