@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
	<form action="{{route('posts.store',$post)}}" method="post" class="bg-white py-3 px-4 shadow rounded" accept-charset="utf-8" enctype="multipart/form-data">
    <h2 class="display-4 text-center">NEW POST</h2>
    <hr>
		@csrf
		<div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title">
  </div>
  <div class="form-group">
    <label for="body">Body:</label>
    <textarea name="body" class="form-control" id="editor" placeholder="Enter a body text"></textarea>
  </div>
  <div class="input-group">  
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="image_url" id="CustomFile">
      <label class="custom-file-label" for="CustomFile">Choose a image</label>
    </div>
  </div>
  <br/>
  <input type="submit" class="btn btn-dark btn-sm" value="SAVE">
  <a href="{{url('/dashboard')}}" class="btn btn-secondary btn-sm float-right" title="">BACK</a>
	</form>
</div>
</div>
</div>
@endsection