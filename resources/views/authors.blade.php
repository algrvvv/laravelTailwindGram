@extends('layout.app')

@section('title', 'TWG | Our authors')

@section('content')
    <h1 class="text-gray-700 text-4xl font-semibold text-center mt-10">
        Our authors: 
    </h1>
    <div class="grid grid-cols-3 gap-10 m-10">
        @foreach ($data as $item)
            <div class="card">
                <span class="font-bold text-red-400">
                    <a href="{{ route('profile', $item->id) }}" class="hover:text-red-300 transition-all">
                        {{ $item->username }}
                    </a>
                </span>

                <span class="block text-gray-700">
                    posts count: {{$item->count}}
                </span>
                <span class="block text-gray-700">
                    total views count: {{$item->views}}
                </span>
            </div>
        @endforeach
    </div>

    <div class="flex justify-end pb-10 mr-10">
        {{ $data->links() }}
    </div>
@endsection
