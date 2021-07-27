@if (count($fields) > 0)
	@php $formFields = json_decode(json_encode($fields)); @endphp
	
	@foreach ($formFields as $field) 
		@includeIf('partials.fields._'. $field->type)
	@endforeach
@else
	<div class="text-center text-gray-500">
		No form fields array provided.
	</div>
@endif
 