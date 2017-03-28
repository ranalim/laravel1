{{--https://www.youtube.com/watch?v=G46p9E_rCO0&index=19&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx--}}

@extends('main')

@section('title', '| All Posts')


@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> {{--end of .row--}}

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{ $post->id  }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ mb_substr($post->body, 0, 50, 'UTF-8') }}{{ strlen($post->body)>50 ? "..." : "" }}</td>
                            <td>{{ date('Y년 n월 j일 h:ia', strtotime($post->created_at))}}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>

            {{--
            pagination
                https://www.youtube.com/watch?v=CzoeFyIm9tc&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=24
            --}}
            <div class="text-center">
                {!! $posts->render() !!}
            </div>

        </div>
    </div>

    @endsection