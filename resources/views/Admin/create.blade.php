@extends('Admin.inc.master')

@section('title','create')

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

    <form method="POST" action="{{route('admin.store')}}">
      @csrf
      <div class="card-body">

        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name = 'name' id="exampleInputEmail" placeholder="Enter Admin Name">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="Email" class="form-control" name = 'email' id="exampleInputEmail" placeholder="Enter Admin Email">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="Password" class="form-control" name = 'password' id="exampleInputEmail"placeholder="Enter Admin Password">
        </div>


        <div class="form-group">

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-success">Add</button>
        <a href = "/dashboard/" class = "btn btn-success">Home</a>
      </div>
    </form>

  </div>
</div>
@endsection
