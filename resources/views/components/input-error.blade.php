@props(['errors'])

@if ($errors->any())
    @php
        echo $errors->first($attributes->get('name'), '<p class="text-md text-red-600 text-red-600">:message</p>')
    @endphp
@endif