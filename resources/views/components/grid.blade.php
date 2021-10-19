@props([
	'mobile' => 1,
	'tablet' => 1,
	'laptop' => 1,
	'desktop' => 1,
	'mobileGap' => null,
	'tabletGap' => null,
	'laptopGap' => null,
	'desktopGap' => null,
	'gap' => 6,
])

<div class="grid grid-cols-{{ $mobile }} sm:grid-cols-{{ $tablet }} lg:grid-cols-{{ $laptop }} xl:grid-cols-{{ $desktop }} gap-{{ $mobileGap ?? $gap }} sm:gap-{{ $tabletGap ?? $gap }} md:gap-{{ $laptopGap ?? $gap }} lg:gap-{{ $desktopGap ?? $gap }}">
	{{ $slot }}
</div>