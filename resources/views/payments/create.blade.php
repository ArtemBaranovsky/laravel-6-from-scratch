@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <form action="/payments" method="post">
                @csrf
                <button class="button-primary" type="submit">Make a payment</button>
            </form>
        </div>
    </div>
@endsection
