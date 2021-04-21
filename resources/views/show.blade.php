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
                <th>no.</th>
                <th>name</th>
                <th>job</th>
                <th>Opinion</th>
                <th>Reply</th>
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
                <td>{{ $key->job }}</td>
                <td>{{ $key->op }}</td>
                <td>@foreach($reply as $k) 
                @if($k->parent_id == $key->id)
                {{ $k->reply }}
                @endif
                @endforeach </td>
                <td>
                {{--<a href="edit/{{$key->id}}" class="btn btn-info">Edit</a>
                    <a href="delete/{{$key->id}}" class="btn btn-danger">Delete</a>--}}
                    <a href="view_detail/{{$key->id}}" class="btn btn-info">View Reply</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div style="text-align:center;">
        {{ $data->appends(request()->input())->links() }}
        </div>
    </div>
</div>
</div>
</div>


@endsection