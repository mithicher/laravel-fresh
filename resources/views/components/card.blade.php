@props([
	'noPadding' => false,
	'overflowHidden' => false,
	'formAction' => false,
	'shadow' => 'default'
])

@php
	$shadowClass = [
		'small' => 'shadow-md',
		'default' => 'shadow',
		'medium' => 'shadow-md',
		'large' => 'shadow-lg',
	][$shadow];

	$cardPadding = $noPadding ? 'p-0' : 'p-5';
	$overflowHiddenClass = $overflowHidden ? 'relative overflow-hidden' : '';
@endphp

<div class="bg-white shadow rounded-lg {{ $overflowHiddenClass }} {{ $shadowClass }}">
	@if($formAction)
		<form wire:submit.prevent="{{ $formAction }}">
	@endif
	
	<div {{ 
		$attributes->merge([
			'class' => $cardPadding
		]) 
	}}>
		{{ $slot }}
	</div>

	@if(isset($footer))
		<div class="px-5 py-4 bg-gray-50 rounded-b-lg">
			{{ $footer }}
		</div>
	@endif

	@if($formAction)
		</form>
	@endif
</div>
