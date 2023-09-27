@extends('layout.app')

@section('title', 'TWG | Home Page')

@section('content')
    <form method="GET" action="#" class="w-96 m-10 mx-auto">
        {{-- <select name="filter">
            <option value="0">0</option>
            <option value="popularity" selected="selected">popularity</option>
        </select> --}}

        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="search" name="search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search by title, content or author..." required value="{{ request('search') }}">
            <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    @if (!empty($text))
        <p class="text-2xl text-center">Search by <span class="text-blue-600 underline">{{ $text }}</span></p>
    @endif
    <div class="mt-8 p-5 grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-10">
        @foreach ($data as $item)
            {{-- {{$item->user_id}} --}}
            <div class="card">
                <a href="{{ route('post', [$item->user_id, $item->id]) }}" class="title">
                    {{ $item->title }}
                </a>
                <span class="block mt-5">
                    {{ $item->content }}
                </span>
                <span class="flex justify-between my-5 text-sm">
                    {{ $item->created_at }}
                    <span class="flex items-center">
                        <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="#000000"
                                d="M512 160c320 0 512 352 512 352S832 864 512 864 0 512 0 512s192-352 512-352zm0 64c-225.28 0-384.128 208.064-436.8 288 52.608 79.872 211.456 288 436.8 288 225.28 0 384.128-208.064 436.8-288-52.608-79.872-211.456-288-436.8-288zm0 64a224 224 0 110 448 224 224 0 010-448zm0 64a160.192 160.192 0 00-160 160c0 88.192 71.744 160 160 160s160-71.808 160-160-71.744-160-160-160z" />
                        </svg>
                        <p class="mx-2 text-center">{{ $item->views }} views</p>
                    </span>
                </span>
                <span class="block font-bold text-red-400">
                    Created by <a href="{{ route('profile', $item->user_id) }}"
                        class="hover:text-red-300 transition-all">{{ $item->username }}</a>
                </span>
            </div>
        @endforeach
    </div>

    <div class="flex justify-end pb-10 mr-10">
        {{ $data->links() }}
    </div>
@endsection
