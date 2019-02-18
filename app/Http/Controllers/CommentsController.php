<?php

namespace App\Http\Controllers;

use Validator;
use App\Comment;
use App\Events\CommentEvent;
use Session;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

  public function __construct()
  {
    $this->middleware(['auth']);
  }
  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'body' => 'required|max:255'
      ]);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }
     $comment = new Comment();
     $comment->user_id = $request->user_id;
     $comment->post_id = $request->post_id;
     $comment->comment = $request->body;
     if ($comment->save()) {
      broadcast(new CommentEvent($comment));
     	return('Comment Created Successfully');
     }else{
     	return('Error');
     }
  }
}
