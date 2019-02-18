@extends('User.index')
@section('content')  
    <!-- Title -->
    <h1 class="mt-4">{{$post->title}}</h1>
    <!-- Author -->
    <p class="lead">
      by
      <a href="#">{{$post->user_id}}</a>
    </p>
    <hr>
    <!-- Date/Time -->
    <p>@isset($post->created_at){{$post->created_at->diffForHumans()}}@endisset</p>

    <hr>
    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{$post->image ? url('/images'.'/'.$post->image) : 'http://placehold.it/900x300'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>


    <hr>

    <h3>Comments</h3><hr>
    <!-- Single Comment -->
    <div id="comment-container">
      @foreach($post->comments as $comment)
      <hr>
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->user_id}}</h5>
            {{$comment->comment}}
          </div>
        </div>
      @endforeach
    </div>

    <!-- Comments Form -->
    <div class="card my-4">
      <h5 class="card-header">Leave a Comment:</h5>
      <div class="card-body">
        <form>
          <div class="form-group">
            <textarea class="form-control" rows="3" id="comment-text" data-post="{{$post->id}}"></textarea>
          </div>
          <button type="submit" id="comment" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection  