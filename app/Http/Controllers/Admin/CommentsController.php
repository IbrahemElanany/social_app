<?php

namespace App\Http\Controllers\Admin;


use Session;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function comments()
    {
    	$comments = Comment::all();
    	$title = 'Comments';
    	return view('admin.comments.index',compact('comments','title'));
    }
    public function deleteComments($id)
    {
        Comment::where('id',$id)->delete();
        Session::flash('error','Comment Deleted Successfully');
        return redirect()->back();
    }
}
