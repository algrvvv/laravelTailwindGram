<div class="bg-white shadow-md w-1/2 p-10 my-5">
    <h3 class="text-xl underline font-bold">{{ $comment->title }}</h3>
    <small>{{ $comment->created_at }}</small>
    <p class="">{{ $comment->content }}</p>
    <p class="text-red-400 font-bold hover:text-red-300 transition-all">
        <a href="{{ route('profile', [$comment->user_id]) }}">
            <span class="flex justify-start">
                {{ $comment->username }}
                @if ($author == $comment->username)
                    <span class="user-auther mx-1">author</span>
                @endif
            </span>
        </a>
    </p>
</div>