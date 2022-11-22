@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full border-stone-200 focus:border-stone-300 focus:ring-2 focus:ring-stone-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
