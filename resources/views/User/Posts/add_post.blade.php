@extends('User.index')
@section('content')

	<h1>Create post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
	    <div class="form-group">
	        <label for="title">Title <span class="require">*</span></label>
	        <input type="text" class="form-control" name="title" required />
	    </div>
	    <div class="form-group">
	        <label for="description">Description</label>
	        <textarea rows="5" class="form-control" name="description" required ></textarea>
	    </div>
        <div class="form-group">
            <label for="image">Image <span class="require">*</span></label>
            <input type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg"/>
        </div>
	    <div class="form-group">
	        <button type="submit" class="btn btn-primary">
	            Create
	        </button>
	    </div>
	</form>
@endsection
