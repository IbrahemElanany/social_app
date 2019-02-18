<?php

namespace App\Http\Controllers\Admin;

use Session;
use Hash;
use App\User;
use App\Post;
use App\Comment;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function users()
    {
    	$users = User::all();
    	$title = 'Users';
    	return view('admin.users.index',compact('users','title'));
    }

    public function deleteUsers($id)
    {
        User::where('id',$id)->delete();
        Session::flash('error','User Deleted Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.users.edit',compact('user'));
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'unique:users,email,'.$request->user_id
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::where('id',$request->user_id)->first();
        $name = $request->name;
        $email = $request->email;

        if($request->has('password') && !empty($request->password))
        {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->name = $name;
        $user->email = $email;
        if ($user->save()) {
            Session::flash('message','User Updated Successfully');
            return redirect()->back();
        }else{
            Session::flash('error','Something Went wrong');
            return redirect()->back();
        }
    }
}
