<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5">
                <!-- component -->
                <div class="container px-5">
                    <div class="w-full bg-gradient-to-l from-slate-300 to-slate-100 text-slate-600 border border-slate-300 grid grid-col-2 justify-start p-4 gap-4 rounded-lg shadow-md">
                        <div class="col-span-2 text-lg font-bold capitalize rounded-md">
                            {{ $post->title }}
                        </div>
                        <div class="col-span-2 rounded-md">
                            {{ $post->body }}
                        </div>
                        <div class="col-span-1">
                            <a href="{{ route('posts') }}">
                                <button class="rounded-md bg-slate-300 hover:bg-slate-600 hover:text-slate-200 duration-300 p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                        <polyline points="15 3 21 3 21 9"></polyline>
                                        <line x1="10" y1="14" x2="21" y2="3"></line>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- component end -->
            </div>
        </div>
    </div>
</x-app-layout>
