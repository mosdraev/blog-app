<a {{ $attributes->merge([
    'class' => 'cursor-pointer px-3 py-2 mx-1 rounded text-white bg-red-500 border border-transparent font-semibold text-white hover:bg-red-400 active:bg-red-600 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150',
    'type' => 'submit',
    'onclick' => "
        var result = confirm('Are you sure you want to delete this record?');

        if (result)
        {
            event.preventDefault();
            document.getElementById('delete-form').submit();
        }
    " ]) }}>
    {{ $slot }}
</a>

<form method="POST" id="delete-form" action="{{ route('destroyPost', ['id' => $attributes->get('item-id')]) }}">
    @csrf
    <input type="hidden" name="_method" value="POST">
</form>