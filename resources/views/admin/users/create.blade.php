@extends('layouts.admin')




@section('content')


    <h1>Create Users</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
      <div class='form-group'>
         {!! Form::label('name', 'Name:') !!}
         {!! Form::text('name', null, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('email', 'Email:') !!}
         {!! Form::text('email', null, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('password', 'Create Password:') !!}
         {!! Form::password('password', ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('role_id', 'Role:') !!}
         {!! Form::select('role_id', [''=>'Please Choose']+$roles, null, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('is_active', 'Status:') !!}
         {!! Form::select('is_active', array(1=>'Active',0=>'Not Active'), 0, ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::label('photo_id', 'Profile Photo:') !!}
         {!! Form::file('photo_id', ['class'=>'form-control']) !!}
      </div>
      <div class='form-group'>
         {!! Form::submit('Create User', ['class'=>'btn btn-primary btn-block']) !!}
      </div>
    {!! Form::close() !!}
      @include('include.formError')

@stop