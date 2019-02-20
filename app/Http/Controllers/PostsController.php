<?php

namespace App\Http\Controllers;

use Validator;
use App\Post;
use Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::OrderBy('created_at','DESC')->get();
    	return view('User.Posts.posts',compact('posts'));

    }

    public function create()
    {
    	return view('User.Posts.add_post');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $title = $request->title;
        $body = $request->description;
        $image = '';
       $post = new Post();
       if($request->has('image')){
        	$image = $request->image;
           $name = time() . $image->getClientOriginalName();
           $image->move('images',$name);
       	   $post->image = $name;
       }
       $post->user_id = auth()->user()->id;
       $post->title = $title;
       $post->body = $body;
       $post->save();
       Session::flash('message','Post Created Successfully');
       return redirect('/posts');
    }

    public function myPosts()
    {
    	$posts = Post::where('user_id',auth()->user()->id)->OrderBy('created_at','DESC')->get();
    	return view('User.Posts.myposts',compact('posts'));

    }

    public function singlePost($id)
    {
    	$post = Post::where('id',$id)->first();
    	return view('User.Posts.single_post',compact('post'));
    }
    public function edit($id)
    {
      $post = Post::where('id',$id)->first();
      if ($post->user_id == auth()->user()->name) {
        return view('User.Posts.edit_post',compact('post'));
      }else{
        Session::flash('error',"Sorry , You're Not Authorized to do this action ");
        return redirect()->back();
      }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $title = $request->title;
        $body = $request->description;
        $image = '';
       $post = Post::where('id',$request->id)->first();
       if ($post->user_id == auth()->user()->name){
         if($request->has('image')){
            $image = $request->image;
             $name = time() . $image->getClientOriginalName();
             $image->move('images',$name);
             $post->image = $name;
         }
         $post->title = $title;
         $post->body = $body;
         $post->save();
         Session::flash('message','Post Updated Successfully');
         return redirect('/posts/myposts');
       }else{
        Session::flash('error',"Sorry , You're Not Authorized to do this action ");
        return redirect()->back();
      }
    }

    public function delete($id)
    {
      if ($id == auth()->user()->name) {
         Post::where('id',$id)->delete();
         Session::flash('message','Post Deleted Successfully');
         return redirect('/posts/myposts');
      }else{
        Session::flash('error',"Sorry , You're Not Authorized to do this action ");
        return redirect()->back();
      }
     
    }
}
