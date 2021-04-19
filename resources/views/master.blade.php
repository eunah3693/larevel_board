<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{url('/home')}}">Home</a></li>
      <li>@if(!session()->get('id'))<a href=" {{url('/login')}} ">Login/Join</a>@else<a href=" {{url('/welcome')}} ">Logout</a>@endif</li>
      @if(session()->get('is_admin'))
      <li><a href="{{url('/all')}}">Show AllData</a></li>
      @else
      <li><a href="{{url('/reg')}}">Registration</a></li>
      <li><a href="{{url('/show_data')}}">Show Data</a></li>
      @endif
    </ul>
  </div>
</nav>
</div>
<div class="container">
    @yield('content')
</div>
</body>
</html>