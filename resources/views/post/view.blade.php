<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-3 py-4 border-b flex flex-row-reverse space-x-4 space-x-reverse">
                    <a href="" type="button" class="px-3 py-2 rounded text-white bg-red-500">
                        Delete
                    </a>
                    <a href="{{ route('updateAuthorPost', ['id' => $post->id]) }}" type="button" class="px-3 py-2 rounded text-white bg-blue-700">
                        Update
                    </a>
                    {{-- <div class="flex flex-row justify-center items-center">
                        <label class="pr-4" for="post-status">Change Status</label>
                        <select
                            id="post-status"
                            name="status"
                            class="form-select block shadow appearance-none border rounded rounded-md border-gray-300 text-gray-700">
                            <option value="0">{{ __('Draft') }}</option>
                            <option value="1">{{ __('Private') }}</option>
                            <option value="2">{{ __('Publish') }}</option>
                        </select>
                    </div> --}}
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
                            Author: {{ $post->user->profile->first_name }}, {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>