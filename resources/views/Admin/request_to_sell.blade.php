@extends('Admin.inc.master')


@section('title','Requests')


@section('content')
<div class = "content-wrapper">
    <!-- Content Header (Page header) -->
    <div class = "content-header">
    <div class = "container-fluid">
    <div class = "row mb-2">
    <div class = "col-sm-6">
    <h1  class = "m-0">Requests</h1>
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

    {{-- <div   class = "card-body">
      @if(session()->has('deleted'))
        <div class="alert alert-danger">
          {{session()->get("deleted")}}
        </div>
        @endif --}}
    <table class = "table table-bordered">
        <thead>
          <tr>
            <th style = "width: 10px">#</th>
            <th>description</th>
            <th>title</th>
            <th>location</th>
            <th>location_details</th>
            <th>image</th>
            <th>story</th>
            <th>status</th>
            <th>Accept</th>
          </tr>
        </thead>
        <tbody>
          
         
          @foreach ($productPendings as $productPending )
            
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$productPending->description}}</td>
            <td>{{$productPending->title}}</td>
            <td>{{$productPending->location}}</td>
            <td>{{$productPending->location_details}}</td>
            <td>{{$productPending->image}}</td>
            <td>{{$productPending->story}}</td>
            <td>{{$productPending->status}}</td>
            <td><a href = "{{route('product.acceptingProducts' ,$productPending->id)}}" class = "btn btn-success">Accept</a></td>
            
          </tr>
          @endforeach
  

          
  
        </tbody>
      </table>
    </div>
    <!-- /.content -->
  </div>
@endsection

