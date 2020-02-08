@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
    	<div class="bg-white py-3 px-4 shadow rounded">    	
		<h1 class="display-4 text-center">POSTS</h1>
		<hr>
		@if(count($posts)>0)
			@foreach($posts as $post)
			<div class="well">
				<img class="img-fluid img-thumbnail" src="{{asset('images').'/'.$post->image_url}}" alt="">
				<h3><a href="{{route('posts.show',$post)}}" title="">{{$post->title}}</a></h3>
				<small>Written on {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small>		
			</div>
			@endforeach
			{{$posts->links()}}
		@else
		<p class="lead">No posts FOUND!</p>
		@endif
	</div>
	</div>
</div>
</div>
@endsection
