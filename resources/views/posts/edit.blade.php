@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
    @endsection

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

            {{--
            https://www.youtube.com/watch?v=Bo3m_h0QYkU&index=39&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
            --}}
            {!! Form::label('category_id', "Category:" ,['class'=>'form-spacing-top']) !!}
                                        {{--array key and value--}}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}

            {{--https://www.youtube.com/watch?v=BNUYaLWdR04&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=43--}}
            {{--using select2--}}
            {!! Form::label('tags', 'Tags:', ['class'=>'form-spacing-top']) !!}
            {!! Form::select('tags[]', $tags, null ,['class'=>'select2-multi form-control', 'multiple'=>'multiple']) !!}

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

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}

    <script>
        $('.select2-multi').select2();

        //set the value
        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');

    </script>
    @endsection