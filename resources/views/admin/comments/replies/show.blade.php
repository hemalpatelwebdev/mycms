@extends('layouts.admin')

@section('content')

    @if(count($replies) > 0)
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
        @foreach($replies as $reply)
        <tr>
            <td>{{$reply->id}}</td>
            <td>{{$reply->author}}</td>
            <td>{{$reply->email}}</td>
            <td>{{$reply->body}}</td>
            <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
            <td>
                @if($reply->is_active == 1)
                    {!!Form::open(['method' => 'PATCH', 'action' => ['CommentsRepliesController@update',$reply->id]])!!}
                        <input type="hidden" name="is_active" value=0>
                        {!!Form::submit('Disapprove',['class'=>'btn btn-warning'])!!}
                    {!!Form::close()!!}
                @else
                    {!!Form::open(['method' => 'PATCH', 'action' => ['CommentsRepliesController@update',$reply->id]])!!}
                        <input type="hidden" name="is_active" value=1>
                        {!!Form::submit('Approve',['class'=>'btn btn-success'])!!}
                    {!!Form::close()!!}
                @endif
            </td>
            <td>
                {!!Form::open(['method' => 'DELETE', 'action' => ['CommentsRepliesController@destroy',$reply->id]])!!}
                        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
            </td>
        <tr>
        @endforeach
    </table>
    @else
        <h1 class='text-center'>No replies found for this post</h1>
    @endif

@stop