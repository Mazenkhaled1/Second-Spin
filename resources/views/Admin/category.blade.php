@extends('Admin.inc.master')


@section('title','Categories')


@section('content')
<div class = "content-wrapper">
  <!-- Content Header (Page header) -->
  <div class = "content-header">
  <div class = "container-fluid">
  <div class = "row mb-2">
  <div class = "col-sm-6">
  <h1  class = "m-0">Categories</h1>
        </div><!-- /.col -->
        <div class = "col-sm-6">
        <ol  class = "breadcrumb float-sm-right">
        {{-- <li  class = "breadcrumb-item"><a href = "#">Home</a></li> --}}
        <li  class = "breadcrumb-item active">Second Spin</li>
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
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach ( $categories as $category )
        
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$category->name}}</td>
          <td>
            <form method = 'POST' action = "{{route('category.destroy' , $category->id)}}" >
              @csrf
              @method('delete')
         <button type = "submit" class = "btn btn-danger">Remove</button>
           </form>
          </td>

        </tr>
        @endforeach
        <a href = "{{route('category.create')}}" class = "btn btn-success">Add</a>
        

      </tbody>
    </table>
  </div>
  <!-- /.content -->
</div>
@endsection





            {{-- <td><a href="{{route('products.edit')}}" class= "btn btn-primary">Edit</a></td> --}}