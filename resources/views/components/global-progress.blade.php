@props([
	'color' => '#d72630'
])

<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js" defer></script>

@once
@push('styles')
<style>
	/*!
		* pace.js v1.2.4 | Default theme
		* https://github.com/CodeByZach/pace/
		* Licensed MIT © HubSpot, Inc.
		*/
	.pace {
		-webkit-pointer-events: none;
		pointer-events: none;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none
	}

	.pace-inactive {
		display: none
	}

	.pace .pace-progress {
		background: {{ $color }};
		position: fixed;
		z-index: 2000;
		top: 0;
		right: 100%;
		width: 100%;
		height: 3px
	}
</style>
@endpush
@endonce
