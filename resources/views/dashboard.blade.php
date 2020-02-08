@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">DASHBOARD</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif                    
                    <p class="h3">Blog Posts <a href="{{route('posts.create')}}" class="btn btn-dark btn-sm float-right" title="">NEW POST</a></p>
                    @if(count($posts)>0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">POST</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td><a href="{{route('posts.edit',$post)}}" title="" class="btn btn-dark btn-sm float-right">EDIT</a></td>
                                <td>
                                <a href="#" class="btn btn-secondary btn-sm" onclick="event.preventDefault(); document.getElementById('delete-post').submit();" title="">DELETE</a>
    <form id="delete-post" action="{{route('posts.destroy',$post)}}" class="d-none" method="post" accept-charset="utf-8">@csrf @method('DELETE')</form></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <p class="lead">You have no posts!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection