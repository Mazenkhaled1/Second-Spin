@extends('Admin.inc.master')


@section('title','Charities')


@section('content')
<div class = "content-wrapper">
  <!-- Content Header (Page header) -->
  <div class = "content-header">
  <div class = "container-fluid">
  <div class = "row mb-2">
  <div class = "col-sm-6">
  <h1  class = "m-0">Charities</h1>
        </div><!-- /.col -->
        <div class = "col-sm-6">
        <ol  class = "breadcrumb float-sm-right">
        <li  class = "breadcrumb-item"><a href = "#">Home</a></li>
        <li  class = "breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
    <form action="{{ route('charities.search') }}" method="GET">
      <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Search charities...">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
  </form><!-- /.container-fluid -->
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
        
        @foreach ( $charities as $charity )
        
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$charity->name}}</td>
          <td>
            <form method = 'POST' action = "{{route('charity.destroy' , $charity->id)}}" >
              @csrf
              @method('delete')
         <button type = "submit" class = "btn btn-danger">Remove</button>
           </form>
          </td>

        </tr>
        @endforeach
        <a href = "{{route('charity.create')}}" class = "btn btn-success">Add</a>
        

      </tbody>
    </table>
  </div>
  <!-- /.content -->
</div>
@endsection





            {{-- <td><a href="{{route('products.edit')}}" class= "btn btn-primary">Edit</a></td> --}}