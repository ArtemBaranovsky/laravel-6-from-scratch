@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>List of all articles</h2>
                    @foreach ($articles as $article)
                        <h3>{{ $article->title}}</h3>
                        <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                        <p>{{ $article->body}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
