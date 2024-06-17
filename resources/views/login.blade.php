<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- <link rel="stylesheet" href="./css/index.css"> -->
    <link rel="stylesheet" href="{{asset('Login')}}/form.css">
</head>
<body>
    
    
  <!------------------------------------form---------------------------------->

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if(session()->has('success'))
  <div class="alert alert-success">
    {{session()->get("success")}}
  </div>
  @endif

    
  <div class="formm" methd="POST">
    

    <form action="{{ route('admin.login') }}" method="POST" class="form hide">
        @csrf
      <h1>Login</h1>

      <label>Email</label>
     <input type="email" name="email" id="" placeholder="Your email.." class="input">


      <label>Password</label>
      <input type="password" name="password" placeholder="your password" class="input">



        <button name="submit" id="submit" type="submit" >Submit</button>
        
        
        
      </form>
    </div>
    <!----------------------form----------------------------->
    
</body>
</html>
