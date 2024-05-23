@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'focus:border-petconnect-color-600 focus:ring-petconnect-color-600 rounded-md shadow-sm border-petconnect-color',
]) !!}>
