@props(['value'])

<label {{ $attributes->merge(['class' => 'block  text-sm text-gray-500 uppercase']) }}>
    {{ $value ?? $slot }}
</label>
