@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-pink-800']) }}>
    {{ $value ?? $slot }}
</label>
