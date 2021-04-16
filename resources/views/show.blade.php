@extends('master')
@section('content')
<div class="card-body">
@if(session()->get('message'))
<div class="alert alert-info">
   {{session()->get('message')}}
</div>
@endif
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>sl. no.</th>
                <th>name</th>
                <th>email</th>
                <th>address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
               <?php
               $s1=1;
                foreach($data as $key){
               ?>
               <tr>
                <td>{{ $s1++ }}</td>
                <td>{{ $key->name }}</td>
                <td>{{ $key->email }}</td>
                <td>{{ $key->address }}</td>
                <td>
                    <a href="edit/{{$key->id}}" class="btn btn-info">Edit</a>
                    <a href="delete/{{$key->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</div>
</div>
</div>


@endsection