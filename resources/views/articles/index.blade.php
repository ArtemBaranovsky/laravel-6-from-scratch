@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            @foreach ($articles as $article)
            <div id="content">
                <div class="title">
{{--                        <h2><a href="/articles/{{ $article->id }}">{{ $article->title}}</a></h2>--}}
{{--                        <h2><a href="{{ route('articles.show') }}">{{ $article->title}}</a></h2>--}}
{{--                        <h2><a href="{{ route('articles.show', $article->id) }}">{{ $article->title}}</a></h2>--}}
{{--                        <h2><a href="{{ route('articles.show', $article) }}">{{ $article->title}}</a></h2>--}}
                        <h2><a href="{{$article->path() }}">{{ $article->title}}</a></h2>
                </div>
                <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
{{--                in real life add thumbnail column and do like so--}}
{{--                <p><img src="/images/{{ $article->thumb }}" alt="" class="image image-full" /> </p>--}}
                <p>{!! $article->excerpt !!}</p>
            </div>
            @endforeach
        </div>
    </div>
@endsection
