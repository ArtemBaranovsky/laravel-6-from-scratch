@foreach($conversation->replies as $reply)
    <div>
        <header style="display: flex; justify-content: space-between;">
            <p class="m-0"><strong>{{ $reply->user->name }} said...</strong></p>
{{--            @if ($conversation->best_reply_id == $reply->id)--}}
            @if ($reply->isBest())
                <span style="color: green;">Best Reply!!</span>
            @endif
        </header>

        {{ $reply->body }}

{{--        @can('update-conversation', $conversation)--}}
        @can('update', $conversation)
{{--        @can('create', $conversation)--}}
{{--            <form method="POST" action="/conversations/best-replies/{{ $reply->id }}">--}}
            <form method="POST" action="/best-replies/{{ $reply->id }}">
                @csrf
                <button type="submit" class="btn btn-outline-primary px-1 py-0 text-muted">Best reply</button>
            </form>
        @endcan
    </div>

    @continue($loop->last)

    <hr>
@endforeach
