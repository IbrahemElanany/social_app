@extends('admin.index')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{$title}}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Comment</th>
                <th>Post Title</th>
                <th>Author</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($comments as $comment)
                <tr>
                  <td>{{$comment->id}}</td>
                  <td>{{$comment->comment}}</td>
                  <td>{{$comment->post->title}}</td>
                  <td>{{$comment->user_id}}</td>
                  <td>
                    <a href="{{ route('admin.comment.delete',$comment->id) }}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Comment</th>
                <th>Post Title</th>
                <th>Author</th>
                <th>Actions</th>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection