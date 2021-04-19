@extends('master')

@section('content')
<div class="card-body">
@if(session()->get('msg'))
<div class="alert alert-info">
   {{session()->get('msg')}}
</div>
@endif
    <form action="check" method="post">
    @csrf
        
        <div class="row">
            
            <div class="col-md-6">
                <label>Enter Nickname</label>
                <input type="text" name="uname" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Enter Password</label>
                <input type="password" name="u_pass"  class="form-control" required>
            </div>
        </div>
       
        <button type="submit" class="btn btn-primary">로그인</button>
    </form>
    <a href="{{url('/create_account')}}" class="btn btn-primary">닉네임만들기</a>
</div>
@endsection