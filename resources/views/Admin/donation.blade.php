@extends('Admin.inc.master')


@section('title','Donations')


@section('content')
<div class = "content-wrapper">
    <!-- Content Header (Page header) -->
    <div class = "content-header">
    <div class = "container-fluid">
    <div class = "row mb-2">
    <div class = "col-sm-6">
    <h1  class = "m-0">Donations</h1>
          </div><!-- /.col -->
          <div class = "col-sm-6">
          <ol  class = "breadcrumb float-sm-right">
          <li  class = "breadcrumb-item"><a href = "#">Home</a></li>
          <li  class = "breadcrumb-item active">Dashboard v2</li>
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
            <th>description</th>
            <th>title</th>
            <th>location</th>
            <th>location_details</th>
            <th>image</th>
            <th>charity_id</th>
            <th>start shipping</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ( $donations as $donation )
          
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$donation->description}}</td>
            <td>{{$donation->title}}</td>
            <td>{{$donation->location}}</td>
            <td>{{$donation->location_details}}</td>
            <td>
              @if($donation->image)
                  <img src="{{ asset('storage/' . $donation->image) }}" alt="donation Image" style="max-width: 100px; max-height: 100px;">
              @else
                  No image available
              @endif
          </td>
            <td>{{$donation->charity_id}}</td>
            <td>
              <form method = 'POST' action = "{{route('doantion.destroy' , $donation->id)}}" >
                @csrf
                @method('delete')
           <button type = "submit" class = "btn btn-success">Start Shipping</button>
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
