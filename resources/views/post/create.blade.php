<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($errors) > 0)
                    <ul id="login-validation-errors" class="validation-errors">
                        @foreach ($errors->all() as $error)
                        <li class="validation-error-item">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form class="" action="{{ route('storePost') }}" method="POST">

                        @csrf

                        <div class="mb-4">
                            <label for="post-title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Title') }}</label>
                            <input
                                id="post-title" type="text" name="title" placeholder="Your post title here.."
                                class="shadow appearance-none border rounded rounded-md w-full py-2 px-3 border-gray-300 text-gray-700">
                        </div>

                        <div class="mb-4">
                            <label for="post-content" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Content') }}</label>
                            <textarea
                                id="post-content"
                                class="shadow appearance-none border rounded rounded-md w-full py-2 px-3 border-gray-300 text-gray-700"
                                rows="10"
                                name="content"
                                placeholder="Your content here.."
                            ></textarea>
                        </div>

                        <div class="flex flex-row-reverse space-x-4 space-x-reverse">
                            <a href="" type="button" class="px-3 py-2 rounded text-gray-100 bg-gray-600">
                                Go Back
                            </a>
                            <button type="submit" class="px-3 py-2 rounded text-white bg-blue-700">
                                Create Post
                            </button>
                            <select
                                name="status"
                                class="form-select block shadow appearance-none border rounded rounded-md border-gray-300 text-gray-700">
                                <option value="0">{{ __('Draft') }}</option>
                                <option value="1">{{ __('Private') }}</option>
                                <option value="2">{{ __('Publish') }}</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>