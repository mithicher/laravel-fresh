@props([
    'theme' => 'indigo',
    'id' => null,
    'name' => null,
    'label' => null,
    'checked' => false,
    'noMargin' => false,
    'withErrorMessage' => true,
    'errorMessageFor' => null

])

@php
    $themeColors = [
        'indigo' => 'text-indigo-600 focus:ring-indigo-500',
        'green' => 'text-green-600 focus:ring-green-500',
        'blue' => 'text-blue-600 focus:ring-blue-500',
    ][$theme];
@endphp

<div class="{{ $noMargin ? 'mb-0' : 'mb-5' }}">
    <div class="flex items-start">
        <div class="flex items-center h-5">
            <input 
                id="{{ $id ?? $name }}" 
                name="{{ $name }}" 
                type="checkbox" 
                
                {{
                    $attributes->merge([
                        'class' => 'form-radio focus:outline-none rounded border-gray-300 h-4 w-4 ' . $themeColors
                    ])
                }} 
                
                @if ($attributes->has('wire:model'))
                    {{ $attributes->whereStartsWith('wire:model') }}
                @endif
    
                @if ($checked)
                    checked
                @endif
            />
        </div>
        <div class="ml-3 text-sm">
            <label for="{{ $id }}" class="font-medium text-gray-700">{{ $label }}</label>
            <p class="text-gray-500">{{ $slot }}</p>
        </div>
    </div>

    @if($withErrorMessage)
        <x-input-error for="{{ $errorMessageFor ?? $name }}" class="mt-2" />
    @endif
</div>