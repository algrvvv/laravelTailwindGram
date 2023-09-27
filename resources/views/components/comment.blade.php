<div class="bg-white shadow-md w-1/2 p-10 my-5">
    <h3 class="text-xl underline font-bold">{{ $title }}</h3>
    <p class="">{{ $content }}</p>
    @foreach ($posts as $item)
        <p class="text-red-400 font-bold hover:text-red-300 transition-all">
            <a href="{{ route('profile', $item->user_id) }}">{{ $author }}</a>
        </p>
    @endforeach
</div>
