<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\User;
use App\Role;
use App\Photo;
use App\Post;
use Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        if(trim($request->password) == '') {
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();
            $file->move('UserImages', $name);
            $photo = Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        User::create($input);
        return redirect()->action('AdminUsersController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::pluck('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {
        //
        $input = $request->all();
        $user = User::findOrFail($id);

        if($file = $request->file('photo_id')){
            $path = time().$file->getClientOriginalName();
            $file->move('UserImages',$path);
            $photo = Photo::create(['path'=>$path]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        unlink(public_path().$user->photo->path);
        //$user->posts->delete();
        $user->delete();
        Session::flash('users_deleted', 'The user and associated posts have been deleted');

        return redirect('/admin/users');
    }
}
