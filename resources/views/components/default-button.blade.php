@if ($attributes->has('anchor'))
    {{-- Display anchor tags a button --}}
    <a {{ $attributes->merge([
        'class' => 'cursor-pointer px-4 py-2 bg-blue-700 mx-1 border border-transparent rounded text-white hover:bg-blue-600 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150',
        'type' => 'submit',

    ]) }}>
        {{ $slot }}
    </a>

@else

    <button {{ $attributes->merge([
        'class' => 'cursor-pointer px-4 py-2 bg-blue-700 border border-transparent rounded text-white hover:bg-blue-600 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150',
        'type' => 'submit',

    ]) }}>
        {{ $slot }}
    </button>

@endif
