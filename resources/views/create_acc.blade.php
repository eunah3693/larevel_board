@extends('master')

@section('content')
<div class="card-body">
    <form action="create" method="post">
    @csrf
        
        <div class="row">
            <div class="col-md-4">
                <input type="hidden" name="uid"  >
                <label>Name</label>
                <input type="text" name="uname" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Email</label>
                <input type="text" name="uemail" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Password</label>
                <input type="password" name="u_pass"  class="form-control" required>
            </div>
        </div>
       
        <button type="submit" class="btn btn-primary">가입</button>
    </form>
</div>
@endsection