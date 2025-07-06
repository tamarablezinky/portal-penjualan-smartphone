<a
    {{ $attributes->merge([
        'class' =>
            'block w-full px-4 py-2 text-start text-sm leading-5 text-pink-800 hover:bg-pink-100 focus:outline-none focus:bg-pink-100 transition duration-150 ease-in-out',
    ]) }}>
    {{ $slot }}
</a>
