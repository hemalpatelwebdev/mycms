@extends('layouts.admin')

@section('content')

    @if(count($comments) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
            </tr>
        </thead>
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
            <td>
                @if($comment->is_active == 1)
                    {!!Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update',$comment->id]])!!}
                        <input type="hidden" name="is_active" value=0>
                        {!!Form::submit('Disapprove',['class'=>'btn btn-warning'])!!}
                    {!!Form::close()!!}
                @else
                    {!!Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update',$comment->id]])!!}
                        <input type="hidden" name="is_active" value=1>
                        {!!Form::submit('Approve',['class'=>'btn btn-success'])!!}
                    {!!Form::close()!!}
                @endif
            </td>
            <td>
                {!!Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy',$comment->id]])!!}
                        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
            </td>
        <tr>
        @endforeach
    </table>
    @else
        <h1 class='text-center'>No Comments found for this post</h1>
    @endif

@stop