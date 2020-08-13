@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <br/><br/>
        <div class="col-md-8" style="overflow: auto;">
            <h1 class="page-header">
            </h1>
            @foreach($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="#">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">{{$post->user->name}}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                <hr>
                <p>{!!Str::limit($post->body , 300, '....')!!} </p>
                <a class="btn btn-primary" href="{{route('home.post',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            @endforeach

            

            <!-- Pagination -->
            {{$posts->render()}}

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well mb-4">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for post..">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Blog Categories Well -->
            <div class="well mb-4">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @php $categoryNum = 1 @endphp
                            @foreach($categories as $category)
                                @if($categoryNum % 2 != 0)
                                    <li>
                                        <a href="#">{{$category->name}}</a>
                                    </li>
                                @endif
                                @php $categoryNum ++ @endphp
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @php $categoryNum = 1 @endphp
                            @foreach($categories as $category)
                                @if($categoryNum % 2 == 0)
                                    <li>
                                        <a href="#">{{$category->name}}</a>
                                    </li>
                                @endif
                                @php $categoryNum ++ @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well mb-4">
                <h4>Latest Site Updates</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

</div>

@endsection