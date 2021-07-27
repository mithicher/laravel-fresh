<div x-data="{ 
	confirmed: false,
	toggleConfirm() {
		this.confirmed = true;
		setTimeout(() => this.confirmed = false, 3000);
	} 
}" x-cloak>
	<x-button 
		type="button"
		x-show="!confirmed"
		class="leading-none" 
		color="white"
		x-on:click="toggleConfirm()"
		x-on:click.away="confirmed = false"
	>
		Remove
	</x-button>
	<x-button 
		type="button"
		x-show="confirmed"
		class="leading-none text-red-500 hover:text-red-600 flex items-center" 
		color="white"
		x-on:click="confirmed = false"
		{{ $attributes->whereStartsWith('x-on:click') }}
		x-on:click.away="confirmed = false"
		wire:loading.class="base-spinner opacity-25"
		wire:loading.attr="disabled"
	>
		<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
		<div>Click to confirm</div>
	</x-button>
</div>
