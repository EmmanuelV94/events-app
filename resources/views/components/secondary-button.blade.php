<a
    {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-white-800 border border-black rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-black-900 focus:ring ring-black-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
