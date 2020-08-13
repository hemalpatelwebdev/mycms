@extends('layouts.admin')






@section('content')

    @if(Session::has('post_deleted'))
    <p class='bg-info'>{{Session::get('post_deleted')}} </p>
    @endif
    <h1>Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Created</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'No Category'}}</td>
                    <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->created_at->diffForhumans()}}</td>
                    <td><a href="{{route('home.post',$post->id)}}" target="_blank">View Post</a></td>
                    <td><a href="{{route('comments.show',$post->id)}}" target="_blank">View Comments</a></td>
                </tr>
            @endforeach
        </thead>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@stop