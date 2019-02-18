<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function users()
    {
    	$users = User::all();
    	$title = 'Users';
    	return view('admin.users.index',compact('users','title'));
    }

    public function posts()
    {
    	$posts = Post::all();
    	$title = 'Posts';
    	return view('admin.posts.index',compact('posts','title'));
    }

    public function comments()
    {
    	$comments = Comment::all();
    	$title = 'Comments';
    	return view('admin.comments.index',compact('comments','title'));
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    } 
}
