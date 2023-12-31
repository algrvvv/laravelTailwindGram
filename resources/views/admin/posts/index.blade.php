@extends('layout.admin')

@section('title', 'admin')

@section('content')
    <h1>
        @if (count($data))
            All new post ({{ count($data) }})
        @else
            No one new post
        @endif:
    </h1>
    {{-- <div class="flex-grow p-6 overflow-auto bg-gray-800"> --}}
    <div class="grid grid-cols-3 gap-6">
        @foreach ($data as $item)
            <div class="w-[550px] col-span-1 bg-gray-700 rounded p-3 shadow-md">
                <span class="font-bold underline">{{ $item->title }}</span>
                <span class="block ">{{ $item->content }}</span>

                <div class="flex justify-end space-x-3">
                    <form action="{{ route('admin.delete', $item->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                            class="transition-all float-right hover:underline hover:text-red-400">Ban</button>
                    </form>
                    <form action="{{ route('admin.submit', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <button type="submit"
                            class="transition-all float-right hover:underline hover:text-green-400">Allow</button>
                    </form>
                </div>

            </div>
        @endforeach
    </div>

    {{-- <div class="grid grid-cols-3 gap-6">
            @foreach ($data as $item)
                <div class="col-span-1 bg-gray-700 rounded p-3">
                    <span class="font-bold">{{ $item->title }} / ID: {{ $item->id }}</span>
                    <span class="block">{{ $item->content }}</span>

                    <form action="{{ route('admin.submit', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="transition-all float-right hover:underline hover:text-blue-400">Submit</button>
                    </form>
                </div>
            @endforeach
        </div> --}}
    {{-- </div> --}}
@endsection
