@extends('layouts.admin')

@section('content')

    @if(Session::has('users_deleted'))
        <p class='bg-info'>{{Session::get('users_deleted')}} </p>
    @endif

    <h1>Users</h1>
    <table class="table">
        <thead class="thead-dark">
            <th></th>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
        </thead>
        <tbody>
            @if($users)
                
                    @foreach($users as $user)
                    <tr>
                        <td><img width = "35" height = "35" src = "{{$user->photo ? $user->photo->path : '' }}"></td>
                        <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
            @endif
        </tbody>
    </table>



@stop