@extends('layouts.app')
@section('content')
	<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
    	<div class="bg-white py-3 px-4 shadow rounded">
		<h1 class="display-4 text-center">{{$post->title}}</h1>
		<hr>
		<img class="img-fluid img-thumbnail" src="{{asset('images').'/'.$post->image_url}}" alt="">
		<div>{!!$post->body!!}</div>
		<small>Written on {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small><br>
		@if(!Auth::guest())
			@if(Auth::user()->id == $post->user_id)
				<a href="{{route('posts.edit',$post)}}" class="btn btn-dark btn-sm" title="">EDIT</a>	
				<a href="{{route('posts.destroy',$post)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('delete-post').submit();" title="">DELETE</a>
				<form id="delete-post" action="{{route('posts.destroy',$post)}}" class="d-none" method="post" accept-charset="utf-8">@csrf @method('DELETE')</form>
			@endif
		@endif
		<a href="{{route('posts.index')}}" class="btn btn-secondary btn-sm float-right" title="">Go Back</a>
		</div>
	</div>
	</div>
@endsection