@extends('main')

@section('title', '| View Post')
    @endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            {{--
            Todo    carriage return
            --}}
            {{--<p class="lead">{!! nl2br($post->body) !!} </p>--}}
            <p class="lead">{!! str_replace("\n","<br/>", $post->body) !!} </p>

            <hr>

            {{-- todo important get tags belong to this post
            https://www.youtube.com/watch?v=BNUYaLWdR04&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=43
            --}}
            @foreach($post->tags as $tag)
                <span class="label label-default">{{ $tag->name }}</span>
                @endforeach

        </div>

        {{--https://www.youtube.com/watch?v=tXq4J2siGew&index=18&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx--}}
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url Slug:</label>
                    {{--https://www.youtube.com/watch?v=VqewG1lcjKw&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=28--}}
                    <p><a href="{{ route('blog.single', $post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
                </dl>

                {{--https://www.youtube.com/watch?v=Bo3m_h0QYkU&index=39&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx--}}
                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{ $post->category->name }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                        {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                    </div>
                    <div class="col-sm-6">
                        {{--https://www.youtube.com/watch?v=D5-balLS_LM&index=23&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx--}}
                        {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'delete']) !!}
                        {{--{!! Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}--}}
                        {{--<a href="#" class="btn btn-danger btn-block">Delete</a>--}}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

                {{--https://www.youtube.com/watch?v=xvPWtUpyHzM&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=25--}}
                <div class="row">
                    <div class="col-md-12">
                        {!! Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection