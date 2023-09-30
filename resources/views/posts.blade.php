@extends('layout.app')
@section('title')
    TWG | {{ $author }} posts
@endsection

@section('content')
    <div class="flex justify-center items-center max-w-5xl m-auto">
        @foreach ($posts as $item)
            <div class="bg-white rounded shadow-md p-10 m-10">
                <span class="font-bold text-3xl">{{ $item->title }}</span>
                <span class="user-auther">{{ $item->author }}</span>
                <span class="block mt-5 text-2xl">
                    {{ $item->content }}
                </span>
                <span class="block mt-5 text-sm">
                    <span class="flex justify-between">
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
                </span>
                <span class="block font-bold text-red-400">
                    Created by <a href="{{ route('profile', $item->user_id) }}"
                        class="hover:text-red-300 transition-all">{{ $author }}</a>
                </span>
            </div>
        @endforeach
    </div>

    <div class="flex flex-col justify-center items-center ">
        <h1 class="font-bold text-3xl my-3">Comments part: </h1>
        @if (count($comments))
            @foreach ($comments as $comment)
                <x-comment :comment="$comment" :author="$author"></x-comment>
            @endforeach
        @else
            <x-no-comment></x-no-comment>
        @endif

    </div>

    @auth
        <div>
            <div class="flex items-center justify-center mx-8 mb-4">
                @foreach ($posts as $item)
                    <form class="bg-white rounded-lg px-4 pt-2" method="post"
                        action="{{ route('comment.store', [$item->user_id, $item->id]) }}">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <input type="text" placeholder="Subject" id="title" name="title"
                                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full mb-3 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                                <textarea
                                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                    name="content" id="content" placeholder='Type Your Comment' required></textarea>
                            </div>
                            <div class="w-full md:w-full flex items-start px-3">
                                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-xs md:text-sm pt-px">Some text is okay.</p>
                                </div>
                                <div class="-mr-1">
                                    <button type='submit'
                                        class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">
                                        Post Comment </button>
                                </div>
                            </div>
                    </form>
                    {{-- {{$item->id}} - айди поста
                    {{$item->user_id}} - айди пользователя --}}
                @endforeach
            </div>
        </div>
    @endauth
@endsection
