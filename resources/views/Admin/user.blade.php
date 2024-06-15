@extends('Admin.inc.master')


@section('title','Users')


@section('content')
<div class = "content-wrapper">
    <!-- Content Header (Page header) -->
    <div class = "content-header">
    <div class = "container-fluid">
    <div class = "row mb-2">
    <div class = "col-sm-6">
    <h1  class = "m-0">Users</h1>
          </div><!-- /.col -->
          <div class = "col-sm-6">
          <ol  class = "breadcrumb float-sm-right">
          <li  class = "breadcrumb-item"><a href = "#">Home</a></li>
          <li  class = "breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->

    <div   class = "card-body">
      @if(session()->has('deleted'))
        <div class="alert alert-danger">
          {{session()->get("deleted")}}
        </div>
        @endif
    <table class = "table table-bordered">
        <thead>
          <tr>
            <th style = "width: 10px">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>image</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ( $users as $user )
          
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->image}}</td>
            <td>
              <form method = 'POST' action = "{{route('user.destroy' , $user->id)}}" >
                @csrf
                @method('delete')
           <button type = "submit" class = "btn btn-danger">Remove</button>
             </form>
            </td>
  
          </tr>
  
  
          @endforeach
          
  
        </tbody>
      </table>
    </div>
    <!-- /.content -->
  </div>
@endsection

