@extends('layout')

@section('content')
    <div id="page" class="container">
        <form action="/payments" method="post">
            @csrf
            <button class="btn btn-primary" type="submit">Make a payment</button>
        </form>
    </div>
@endsection
