<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Blog Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('modifyPost', ['id' => $post->id]) }}" method="POST">

                        @csrf

                        <input type="hidden" name="author_id" value="{{ $post->author_id }}">

                        <div class="mb-4">
                            <label for="post-title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Title') }}</label>
                            <input
                                id="post-title" value="{{ $post->title }}" type="text" name="title" placeholder="Your post title here.."
                                class="shadow appearance-none border rounded rounded-md w-full py-2 px-3 border-gray-300 text-gray-700">
                            <x-input-error name="title" :errors="$errors" />
                        </div>

                        <div class="mb-4">
                            <label for="post-content" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Content') }}</label>
                            <textarea
                                id="post-content"
                                class="shadow appearance-none border rounded rounded-md w-full py-2 px-3 border-gray-300 text-gray-700"
                                rows="10"
                                name="content"
                                placeholder="Your content here.."
                            >{{ $post->content }}</textarea>
                            <x-input-error name="content" :errors="$errors" />
                        </div>

                        <div class="flex flex-row-reverse space-x-reverse">
                            <x-back-button href="{{ url()->previous() }}">
                                {{ __('Go Back') }}
                            </x-back-button>
                            <x-default-button type="submit">
                                {{  __('Update Post')  }}
                            </x-default-button>
                            <select
                                name="status"
                                class="mx-1 cursor-pointer form-select block shadow appearance-none border rounded rounded-md border-gray-300 text-gray-700">
                                <option value="0" {{ ($post->status == 'draft') ? 'selected' : '' }} >{{ __('Draft') }}</option>
                                <option value="1" {{ ($post->status == 'published') ? 'selected' : '' }} >{{ __('Publish') }}</option>
                                <option value="2" {{ ($post->status == 'private') ? 'selected' : '' }} >{{ __('Private') }}</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>