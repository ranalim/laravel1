{{--https://www.youtube.com/watch?v=VqewG1lcjKw&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=28--}}

@extends('main')

@section('title', "| $post->title ")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
        </div>
    </div>

    @endsection