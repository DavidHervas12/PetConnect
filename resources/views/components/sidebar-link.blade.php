@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'flex items-center p-2 text-gray-900 rounded-lg bg-lime-200 group'
          : 'flex items-center p-2 text-gray-900 rounded-lg hover:bg-lime-200 group';
@endphp

<li>
  <a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
  </a>
</li>
