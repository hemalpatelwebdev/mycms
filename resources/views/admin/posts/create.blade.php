@extends('layouts.admin')


@section('content')
@include('include.tinyeditor')


    <h1>Create Post</h1>

    <div class='row'>
        <div class="col-sm-12">
            {!! Form::open(['method'=>'post', 'action' => 'AdminPostsController@store', 'files'=>true])!!}

            <div class='form-group'>
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [''=>'Please Choose'] + $categories, null, ['class' => 'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body',null, ['class' => 'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Create Post', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        {!! Form::close()!!}
        </div>
   
    </div>
    <div class='row'>
        @include('include.formError')
    </div>

@stop