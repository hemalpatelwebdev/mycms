@extends('layouts.blog-post')

@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Post Content -->
    <p class="lead">{!!$post->body!!}</p>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(Session::has('comment_success'))
        <div class="alert alert-success">
            {{Session('comment_success')}}
        </div>
    @endif

    
    <div class="well">
        @if(Auth::check())
            <h4>Leave a Comment:</h4>
        {!!Form::open(['method'=>'POST','action'=>'PostCommentsController@store'])!!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!!Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
            </div>
            {!!Form::submit('Submit Comment', ['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
        @else
            <h5>Please login to comment</h5>
        @endif
    </div>


    <hr>

    <!-- Posted Comments -->
    @if(count($comments)>0)
    <!-- Comment -->
        @foreach($comments as $comment)
        <div class="media">
            <a class="pull-left mr-2" href="#">
                <img height="64" width="64" class="media-object" src="{{$comment->photo}}" onerror="this.src='http://placehold.it/64x64';">
            </a>
            <div class="media-body mb-5">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$comment->body}}</p>
                <a class="toggle-reply">View Replies</a>
                <span class="view-reply-container">
                    <!-- Nested Comment -->
                    @if(count($comment->replies) > 0)
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                            <div class="media">
                                <a class="pull-left mr-2" href="#">
                                    <img height="64" width="64" class="media-object" src="{{$reply->photo}}" onerror="this.src='http://placehold.it/64x64';" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->title}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>
                            </div><br/>
                            @endif
                        @endforeach
                    <!-- End Nested Comment -->
                @else
                    <h5 class="text-center">No Replies</h5>
                @endif
                </span>
                @if(Auth::check())
                {!!Form::open(['method'=>'POST','action'=>'CommentsRepliesController@createReply'])!!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                            {!!Form::textarea('body',null,['class'=>'form-control', 'placeholder'=>'Leave your reply here', 'rows'=>1])!!}
                        </div>
                        @if(Session::has('reply_created'))
                            <p>{{Session('reply_created')}}</p>
                        @endif
                        {!!Form::submit('Submit Reply',['class'=>'btn btn-primary'])!!}
                {!!Form::close()!!}
                @else
                    <h6 class="text-left">Please login to reply</h5>
                @endif
            </div>
        </div>
        @endforeach
    @endif
@endsection

@section('scripts')
        <script>
            $(document).ready(function () {
                $(".toggle-reply").click(function(){
                    $(this).next().slideToggle("show");
                    if($(".toggle-reply").html() == 'View Replies') {
                        $(".toggle-reply").html("Hide Replies");
                    }
                    else{
                        $(".toggle-reply").html("View Replies");
                    }
                });
            });
        </script>

@endsection