@extends('Admin.inc.master')

@section('title','addcharity')

@section('content')


    <!-- /.card-header -->
    <!-- form start -->
    <div class="container">

      {{-- error part --}}
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      
        {{-- success part --}}
      @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get("success")}}
      </div>
      @endif

    <form method="POST" action="{{route('charity.store')}}">
      @csrf
      <div class="card-body">

        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name = 'name' id="exampleInputEmail" placeholder="Enter Charity Name">
        </div>

        <div class="form-group">

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </form>

  </div>
</div>
@endsection
