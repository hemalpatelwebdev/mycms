@extends('layouts.admin')





@section('content')


    <h1>Categories</h1>
    <br/>
    @if(Session::has('category_deleted'))
        <p class='bg-info'>{{Session::get('category_deleted')}} </p>
    @endif
    <div class="col-sm-6">
        {!!Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store'])!!}
            <div class="form-group">
                {!!Form::label('category','Category Name:')!!}
                {!!Form::text('name', null, ['required'=>'required','class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
            </div>

        {!!Form::close()!!}
    </div>
    <div class="col-sm-6">
    <table class="table">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
        </thead>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                <td>{{$category->created_at->diffForHumans()}}</td>
            </tr>
        @endforeach
    </table>
    </div>



@stop