@extends('layout')

@section('content')
    <div class="container">
{{--        we want to show all notifications for the user--}}
        <ul>
{{--            @foreach($notifications as $notification)--}}
            @forelse($notifications as $notification)
                <li>
                    @if ($notification->type === 'App\Notifications\PaymentReceived')
        {{--                    <li>We have received a payment of {{ $notification->data['amount'] }} from you</li>--}}
                            We have received a payment of ${{ $notification->data['amount'] /100 }} from you
                    @endif
                </li>
{{--                <li>{{ $notification->type }}</li>--}}
            @empty
                <li>You have no unread notifications at this time.</li>
            @endforelse
        </ul>
    </div>
@endsection
