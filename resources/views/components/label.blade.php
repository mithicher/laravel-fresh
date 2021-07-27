@props([
    'value' => null,
    'optional' => false
])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-800']) }}>
    {{ $value ?? $slot }}

    @if($optional === true)
        <span class="text-gray-400 ml-1">(Optional)</span>
    @endif
</label>
