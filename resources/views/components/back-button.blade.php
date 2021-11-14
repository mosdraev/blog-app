<a {{ $attributes->merge([
    'class' => 'cursor-pointer mx-1 px-4 py-2 bg-gray-700 border border-transparent rounded text-white hover:bg-gray-600 active:bg-gray-800 focus:outline-none focus:border-gray-800 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150',
    'type' => 'button',
]) }}>
    {{ $slot }}
</a>
