{{--https://www.youtube.com/watch?v=El4yziFuygQ&index=12&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx--}}

{{--parsely js  https://www.youtube.com/watch?v=JmvHTg0sy6o&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=14--}}

@extends('main')

@section('title', '| Create')

@section('stylesheets')
    {{--<link rel="stylesheet" href="{{ url() }}/css/parsley.css" >--}}
    {!! Html::style('css/parsley.css') !!}
    {{--https://www.youtube.com/watch?v=BNUYaLWdR04&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=43--}}
    {!! Html::style('css/select2.min.css') !!}
    @endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Crete New Post</h1>
            <hr>
            {!! Form::open(array('action' => ['PostController@store'],'_method' => 'POST','id'=>'form', 'data-parsley-validate'=>'')) !!}
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) !!}

                {!! Form::label('slug', 'Slug:') !!}
                {!! Form::text('slug', null, ['class'=>'form-control', 'required'=>'', 'minlength'=>'5', 'maxlength'=>'255']) !!}

                {{--
                https://www.youtube.com/watch?v=Bo3m_h0QYkU&index=39&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
                --}}
                {!! Form::label('category_id', 'Category:') !!}
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                </select>

                {{--https://www.youtube.com/watch?v=BNUYaLWdR04&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=43--}}
                {{--using select2--}}
                {!! Form::label('tags', 'Tags:') !!}
                <select name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>


                {!! Form::label('body', 'Post Body:') !!}
                {!! Form::textarea('body', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) !!}

                {!! Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;')) !!}
            {!! Form::close() !!}
        </div>
    </div>

    @endsection

@section('scripts')
    {{--https://www.youtube.com/watch?v=JmvHTg0sy6o&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=14--}}
    {{--<script src="{{ url() }}/js/parsley.min.js"></script>--}}
    {!! Html::script('js/parsley.min.js') !!}
    {{--using select2--}}
    {!! Html::script('js/select2.min.js') !!}

    {{--Localization--}}
    {!! Html::script('js/i18n/ko.js') !!}

    <script type="text/javascript">
        $('#form').parsley();

//        https://www.youtube.com/watch?v=BNUYaLWdR04&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=43
//        using select2
        $('.select2-multi').select2();
    </script>
    @endsection