@extends('layouts.admin')




@section('content')


    <h1>Edit User</h1>

   <img src="{{$user->photo ? $user->photo->path :'https://via.placeholder.com/150'}}" class="img-responsive img-rounded">

    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
      <div class='form-group'>
         {!! Form::label('name', 'Name:') !!}
         {!! Form::text('name', null, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('email', 'Email:') !!}
         {!! Form::text('email', null, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('role_id', 'Role:') !!}
         {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('is_active', 'Status:') !!}
         {!! Form::select('is_active', array(1=>'Active',0=>'Not Active'), null, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('photo_id', 'Profile Photo:') !!}
         {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-4']) !!}
      </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]])!!}
      <div class= 'form-group'>
         {!! Form::submit('Delete User', ['class' => 'btn btn-danger col-sm-4']) !!}
      </div>
    {!! Form::close() !!}
      @include('include.formError')

@stop