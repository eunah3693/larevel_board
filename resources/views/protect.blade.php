@extends('master')

@section('content')
<div class="card-body">
    Welcome! {{ $name }}
    <p><a href="{{url('/logout')}}" class="btn btn-danger">๋ก๊ทธ์์</a></p>
</div>
@endsection