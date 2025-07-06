<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center px-4 py-2 bg-pink-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-900 focus:bg-pink-900 active:bg-pink-950 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
