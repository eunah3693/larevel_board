@extends('master')

@section('content')
<div class="card-body">
    Welcome! {{ $username }}
    <p><a href="{{url('/logout')}}" class="btn btn-danger">로그아웃</a></p>
</div>
@endsection