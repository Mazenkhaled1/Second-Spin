@extends('Admin.inc.master')


@section('title','Dashbosard')


@section('content')
<div class = "content-wrapper">
  <!-- Content Header (Page header) -->
  <div class = "content-header">
  <div class = "container-fluid">
  <div class = "row mb-2">
  <div class = "col-sm-6">
  <h1  class = "m-0">Admins</h1>
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
  <div class = "card-body">
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
          <th>Add</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach ( $admins as $admin )
        
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$admin->name}}</td>
          <td>{{$admin->email}}</td>
          <td><a href = "{{route('admin.create')}}" class = "btn btn-success">Add</a></td>
          <td>
            <form method = 'POST' action = "{{route('admin.destroy' , $admin->id)}}" >
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





            {{-- <td><a href="{{route('products.edit')}}" class= "btn btn-primary">Edit</a></td> --}}