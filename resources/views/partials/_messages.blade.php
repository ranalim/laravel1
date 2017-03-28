{{--https://www.youtube.com/watch?v=-FMecyZs5Cg&index=15&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx--}}

@if(Session::has('success'))
    <div class="alert alert-success">
        <strong>성공:</strong> {{ Session::get('success') }}
    </div>
    @endif

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <strong>실패:</strong>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif