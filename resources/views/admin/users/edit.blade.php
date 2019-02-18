@extends('admin.index')
@section('content')
  <div class="row">
    <!-- left column -->
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit User</h3>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="{{ route('admin.users.update') }}" method="POST">
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            <input type="hidden" name="user_id" value="{{$user->id}}">
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div><!-- /.box -->

    </div><!--/.col (left) -->

  </div> 
@endsection