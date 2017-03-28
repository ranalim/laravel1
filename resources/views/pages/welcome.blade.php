@extends('main')

{{--@section('stylesheets')--}}
	{{--<link rel="stylesheet" href="" content="this is test from welcome">--}}
	{{--@endsection--}}

@section('title', '| Home')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1>Welcome to My Blog!</h1>
				<p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
				<p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
			</div>
		</div>
	</div>
	<!-- end of header .row -->

	<div class="row">
		<div class="col-md-8">

			{{--https://www.youtube.com/watch?v=xvPWtUpyHzM&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=25--}}
			@foreach($posts as $post)
				<div class="post">
					<h3>{{ $post->title }}</h3>
					<p>{{ mb_substr($post->body, 0, 300, 'UTF-8') }}{{ strlen($post->body) > 300 ? '...' : '' }}</p>
					{{--
					 route()를 사용하기 위해 routes.php 에서 named routes가 선언되어 있어야 한다.
					 예) 'as'=>'pages.single'
					 --}}
					<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
					{{--<a href="{{ url() }}/single?id={{ $post->id }}" class="btn btn-primary">Read More</a>--}}
				</div>

				<hr>
				@endforeach

		</div>

		<div class="col-md-3 col-md-offset-1">
			<h2>Sidebar</h2>
		</div>
	</div>
@endsection


{{--@section('scripts')--}}
	{{--<script src=""></script>--}}
	{{--<script>--}}
{{--//		alert('home');--}}
	{{--</script>--}}
	{{--@endsection--}}