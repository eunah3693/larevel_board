@extends('master')
@section('content')
<div class="container">
<div class="card">

@if(session()->get('success'))
<div class="alert alert-info">
   {{session()->get('success')}}
</div>
@endif

<div class="card-body">
    <form action="add_data" method="post">
    @csrf
        <div class="row">
            <div class="col-md-6">
                <label>Name</label>
                <input type="text" name="uname" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="text" name="uemail" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label>Address</label>
                <input type="text" name="uadd" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">제출</button>
    </form>
</div>
</div>
</div>
@endsection