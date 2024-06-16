@extends('Admin.inc.master')


@section('title','Products')


@section('content')
<div class = "content-wrapper">
    <!-- Content Header (Page header) -->
    <div class = "content-header">
    <div class = "container-fluid">
    <div class = "row mb-2">
    <div class = "col-sm-6">
    <h1  class = "m-0">Products</h1>
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
            <th>remove</th>
          </tr>
        </thead>
        <tbody>
          
         
          @foreach ($productAccepted as $Product )
              
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$Product->description}}</td>
              <td>{{$Product->title}}</td>
              <td>{{$Product->location}}</td>
              <td>{{$Product->location_details}}</td>
              <td>
                @if($Product->image)
                    <img src="{{ asset('storage/' . $Product->image) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                @else
                    No image available
                @endif
            </td>
              <td>{{$Product->story}}</td>
              <td>{{$Product->status}}</td>  
              <td>
                <form method = 'POST' action = "{{route('product.destroy' , $Product->id)}}" >
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

