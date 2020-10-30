@extends('layout')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
            <form method="POST" action="/articles">
                @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>
                    <div class="control">
{{--                        <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" id="title" --}}{{--required--}}{{-->--}}
                        <input
                            class="input @error('title') is-danger @enderror"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}">
{{--                        @if($errors->has('title'))--}}
{{--                            <p class="help is-danger">{{ $errors->first('title') }}</p>--}}
{{--                        @endif--}}
                        @error('title')
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        <textarea
                            class="textarea @error('excerpt') is-danger @enderror"
                            type="text"
                            name="excerpt"
                            id="excerpt"
                            value="{{ old('excerpt') }}"></textarea>
                        @error('excerpt')
                        <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                        @enderror

                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>
                    <div class="control">
                        <textarea
                            class="textarea @error('body') is-danger @enderror"
                            type="text"
                            name="body"
                            id="body"
                            value="{{ old('body') }}"></textarea>
                        @error('body')
                        <p class="help is-danger">{{ $errors->first('body') }}</p>
                        @enderror

                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Tags</label>
                    <div class="select is-multiple control">
                        <select
                            name="tags[]"
                            multiple
                        >
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
{{--                        <p class="help is-danger">{{ $errors->first('tags') }}</p>--}}
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
