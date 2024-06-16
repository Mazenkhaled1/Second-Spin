@extends('Admin.inc.master')


@section('title','Orders')


@section('content')
<div class = "content-wrapper">
    <!-- Content Header (Page header) -->
    <div class = "content-header">
    <div class = "container-fluid">
    <div class = "row mb-2">
    <div class = "col-sm-6">
    <h1  class = "m-0">Orders</h1>
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
            <th>total</th>
            <th>delivey_fees</th>
            <th>total_price</th>
            <th>payment_method</th>
            <th>location</th>
            <th>location_details</th>
            <th>start shipping</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ( $orders as $order )
          
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$order->total}}</td>
            <td>{{$order->delivery_fees}}</td>
            <td>{{$order->total_price}}</td>
            <td>{{$order->payment_method}}</td>
            <td>{{$order->location}}</td>
            <td>{{$order->location_details}}</td>
            <td>
              <form method = 'POST' action = "{{route('order.destroy' , $order->id)}}" >
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
