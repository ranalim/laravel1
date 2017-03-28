<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<body>

    @include('partials._nav')


    <div class="container">

        {{--https://www.youtube.com/watch?v=-FMecyZs5Cg&index=15&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx--}}
        @include('partials._messages')

        {{--https://www.youtube.com/watch?v=d9jd9HbQ_CU&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=33--}}
        {{--{{ Auth::check() ? "Logged In" : "Logged Out" }}--}}
        {{--{{ Auth::id() }}--}}


        @yield('content')

        @include('partials._footer')

    </div>
<!-- end of .container -->

    @include('partials._javascript')

    @yield('scripts')

</body>

</html>
