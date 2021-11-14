<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-3 py-4 border-b flex flex-row-reverse space-x-1 space-x-reverse">
                    <x-back-button href="{{ url()->previous() }}">
                        {{ __('Go Back') }}
                    </x-back-button>
                    <x-delete-button item-id="{{ $post->id }}" type="button">
                        {{  __('Delete')  }}
                    </x-delete-button>
                    <x-default-button anchor href="{{ route('updateAuthorPost', ['id' => $post->id]) }}" type="button">
                        {{  __('Update')  }}
                    </x-default-button>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3">
                        <img src="https://via.placeholder.com/450x300" alt="placeholder image"/>
                    </div>
                    <div class="col-span-2">
                        <p class="font-size-20 px-4 py-3 bg-white border-b border-gray-200">
                            {{ $post->title }}
                        </p>
                        <div class="h-44 px-4 py-2 bg-white border-gray-200">
                            {{ $post->content }}
                        </div>
                        <p class="italized underline pt-1 px-4 bg-white border-t border-gray-200">
                            {{  __('Author')  }}: {{ $post->user->profile->first_name }}, {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>