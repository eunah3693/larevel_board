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
    <form action="{{url('/update_data')}}" method="post">
    @csrf
        <?php foreach ($e_data as $key){
        ?>
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="uid" value="{{$key->id}}" >
                <label>Name</label>
                <input type="text" name="uname" class="form-control" value="{{$key->name}}" required>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="text" name="ujob" value="{{$key->job}}"  class="form-control" required>
            </div>
            <div class="col-md-12">
                <label>Opinion</label>
                <input type="text" name="uop" value="{{$key->op}}"  class="form-control" required>
            </div>
        </div>
        <?php   } ?>
        <button type="submit" class="btn btn-primary">수정</button>
    </form>
</div>
</div>
</div>
@endsection