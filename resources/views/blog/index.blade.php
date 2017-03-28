{{--https://www.youtube.com/watch?v=SkVgSOUUGvg&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=30--}}

@extends('main')

@section('title', '| Blog')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $post->title }}</h2>
            <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

            <p>{{ mb_substr($post->body, 0, 250, 'UTF-8') }}{{ strlen($post->body) > 250 ? '...' : '' }}</p>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
            <hr>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->render() !!}
            </div>
        </div>
    </div>

    @endsection