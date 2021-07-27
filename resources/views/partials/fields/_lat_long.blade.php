<div class="{{ $field->width ?? 'col-span-full' }}">
	<x-input
		label="{{ $field->label ?? Str::replace('_', ' ', Str::title($field->name)) }}" 
		id="{{ $field->name }}" 
		name="{{ $field->name }}" 
		wire:model="{{ $field->name }}" 
	/>
 
	<div wire:ignore class="mb-4">
		<div id="mapid" class="rounded-md overflow-hidden"></div>
	</div>
</div>

@once
	@push('styles')
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
	integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
	crossorigin=""/>
	<style>#mapid { height: 300px; }</style>
	@endpush

	@push('scripts')
		<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
			integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
			crossorigin=""></script>
		<script>
			document.addEventListener('livewire:load', function () {
				let defaultCoordinates = [26.1445, 91.7362];
				var map = L.map('mapid').setView(defaultCoordinates, 13);

				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
				}).addTo(map);

				var marker = L.marker(defaultCoordinates).addTo(map);
				
				function updateMarker(lat, long) {
					marker.setLatLng([lat, long])
						.bindPopup("Your location :  " + marker.getLatLng().toString())
						.openPopup();
					return false;
				};

				map.on('click', function(e) {
					let latitude = e.latlng.lat.toString().substring(0, 11);
					let longitude = e.latlng.lng.toString().substring(0, 11);
					let updatedCoordinates = `${latitude}, ${longitude}`;
					@this.set('{{ $field->name }}', updatedCoordinates);
					updateMarker(latitude, longitude);
				});

				var updateMarkerByInputs = function() {
					return updateMarker(@this.get('{{$field->name}}'));
				}

				document.getElementById('{{ $field->name }}').addEventListener("input", updateMarkerByInputs);
			});
		</script>
	@endpush
@endonce