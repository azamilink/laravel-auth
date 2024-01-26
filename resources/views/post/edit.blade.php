<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Post") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5">
                <div class="max-w-md mx-auto relative overflow-hidden z-10 bg-gray-800 p-8 rounded-lg shadow-md before:w-24 before:h-24 before:absolute before:bg-purple-600 before:rounded-full before:-z-10 before:blur-2xl after:w-32 after:h-32 after:absolute after:bg-sky-400 after:rounded-full after:-z-10 after:blur-xl after:top-24 after:-right-12">
                    <x-alert session="post_updated" route="post.all" />

                    <h2 class="text-2xl font-bold text-white mb-6">Edit Your Post</h2>

                    <form method="post" action="{{ route("post.update") }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="title">Post Title</label>
                            <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" name="title" id="title" value="{{ old("title", $post->title) }}" />
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="body">Description</label>
                            <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="3" name="body" id="body">{{ old("body", $post->body) }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button class="bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" type="submit">
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
