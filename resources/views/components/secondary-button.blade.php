<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'inline-flex items-center px-4 py-2 bg-pink-50 border border-pink-300 rounded-md font-semibold text-xs text-pink-800 uppercase tracking-widest shadow-sm hover:bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
