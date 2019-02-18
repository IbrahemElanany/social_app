<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function posts()
    {
    	$posts = Post::all();
    	$title = 'Posts';
    	return view('admin.posts.index',compact('posts','title'));
    }
    public function deletePosts($id)
    {
        Post::where('id',$id)->delete();
        Session::flash('error','Post Deleted Successfully');
        return redirect()->back();
    }
}
