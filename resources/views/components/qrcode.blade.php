@props([
	'size' => 6,
	'data' => 'Hello QR Code',
	'type' => 'QRCODE',
	'dimension' => 2
])

<img 
	@if ($dimension === 2)
		src="data:image/png;base64,{{ DNS2D::getBarcodePNG($data, $type, $size, $size) }}"
	@else
		src="data:image/png;base64,{{ DNS1D::getBarcodePNG($data, $type) }}"
	@endif
	alt="qrcode"   
/>