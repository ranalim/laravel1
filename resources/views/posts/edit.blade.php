@extends('main')

@section('title', '| Edit Blog Post')

@section('content')

    <div class="row">

        {{--https://www.youtube.com/watch?v=6TcnKqr7chU&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=21--}}
        {{--       model object--}}
        {!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT']) !!}

        <div class="col-md-8">

            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control input-lg']) !!}

            {!! Form::label('slug', 'Slug:', ['class'=>'form-spacing-top']) !!}
            {!! Form::text('slug', null, ['class'=>'form-control ', 'required'=>'', 'minlength'=>'5', 'maxlength'=>'255']) !!}

            {!! Form::label('body', 'Post Body:', ['class'=>'form-spacing-top']) !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

        </div>

        {{--https://www.youtube.com/watch?v=tXq4J2siGew&index=18&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx--}}
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
                        {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::submit('Save Changes', ['class'=>'btn btn-success btn-block']) !!}
                        {{--{!! Html::linkRoute('posts.update', 'Save Changes', array($post->id), array('class'=>'btn btn-success btn-block')) !!}--}}
                        {{--<a href="#" class="btn btn-danger btn-block">Delete</a>--}}
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

    @endsection