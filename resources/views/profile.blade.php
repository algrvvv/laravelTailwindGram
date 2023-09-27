@extends('layout.app')
@section('title')
    TWG | {{ $username }} profile
@endsection

@section('content')
    <h1 class="block font-bold text-red-400 text-3xl text-center my-10">
        Created by <span class="underline">{{ $username }}</span>
    </h1>

    @if (count($data) > 0)
        <div class="grid grid-cols-3 gap-10 m-10">
            @foreach ($data as $item)
                <div class="bg-white rounded shadow-md p-4 hover:cursor-pointer transition-all">
                    <span class="title">
                        <a href="{{ route('post', [$item->user_id, $item->id]) }}">{{ $item->title }}</a>
                    </span>
                    <span class="block mt-5">
                        {{ $item->content }}
                    </span>
                    <span class="flex justify-between mt-5 text-sm">
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
                </div>
            @endforeach
        </div>
    @else
        <span class="text-gray-700 font-bold flex justify-center items-center text-3xl underline">the user does not have more than one post</span>
    @endif


@endsection
