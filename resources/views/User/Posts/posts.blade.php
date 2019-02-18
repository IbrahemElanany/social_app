@extends('User.index')
@section('content')
  <!-- Blog Post -->
  <br>
  @foreach($posts as $post)
        <div class="card mb-4">
          <img class="card-img-top" width="750" height="300" src="{{$post->image ? url('/images'.'/'.$post->image) : 'http://placehold.it/750x300'}}" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{$post->body}}</p>
            <a href="{{ route('post.single',$post->id) }}" class="btn btn-primary">Read More &rarr;</a>
            <span class="float-right dark">@if($post->comments->count()> 0)<i class="fa fa-comment" aria-hidden="true"> {{$post->comments->count()}} </i>@endif</span>
          </div>
          <div class="card-footer text-muted">
            @isset($post->created_at){{$post->created_at->diffForHumans()}}@endisset by
            <a href="#">{{$post->user_id}}</a>
          </div>
        </div>
    @endforeach    
@endsection