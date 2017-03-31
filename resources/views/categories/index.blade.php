{{--
https://www.youtube.com/watch?v=YddUdqX-nCI&index=38&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
--}}

@extends('main')

@section('title', '| All Categories')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route'=>'categories.store']) !!}
                <h2>New Category</h2>
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}

                {!! Form::submit('Create New Category', ['class'=>'btn btn-primary btn-block btn-h1-spacing']) !!}

                {!! Form::close() !!}
            </div>
        </div>

    </div>


    @endsection