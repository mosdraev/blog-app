<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Blog Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row-reverse">
                <x-default-button anchor href="{{ route('create') }}" type="button">
                    {{  __('Create New Post')  }}
                </x-default-button>
            </div>
            @if ($post->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You have no blog posts yet.
                    </div>
                </div>
            @else
                @foreach ($post as $item)

                <div class="grid grid-cols-3 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                    <div class="p-3">
                        @if (is_null($item->image_url))
                            <img src="https://via.placeholder.com/450x300" alt="Placeholder Image"/>
                        @else
                            <img src="{{ asset('storage/images/' . $item->image_url) }}" alt="{{ $item->image_url }}"/>
                        @endif
                    </div>
                    <div class="col-span-2">
                        <p class="font-size-20 px-4 py-3 bg-white border-b border-gray-200">
                            <a href="{{ route('authorPost', ['id' => $item->id]) }}">
                                {{ $item->title }}
                            </a>
                        </p>
                        <div class="px-4 py-2 bg-white border-gray-200">
                            {{ $item->content }}
                        </div>
                        <p class="italized underline mb-2 pt-1 px-4 bg-white border-t border-gray-200">
                            Author: {{ $item->user->profile->first_name }}, {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>

                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>