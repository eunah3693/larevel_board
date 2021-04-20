@extends('master')
@section('content')
<div class="card-body">

    <div class="table-responsive">
    <form action="/data_reply" method="post">
    @csrf
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
                <td>{{ $s1++ }} </td>
                <td>{{ $key->name }}</td>
                <td>{{ $key->job }}</td>
                <td ><span style="display:block; width:150px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $key->op }}</span></td>
                
                <td class="u_reply" id="{{$key->id}}" >
                    @foreach($reply as $k)
                    @if($key->id==$k->parent_id)
                    <span style="display:block;  width:150px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $k->reply }}</span>
                    @endif
                    @endforeach
                </td>
                
                <td>
                    <button type="button" class="btn btn-info view" style="padding:0; "><a href="all_detail/{{$key->id}}" style="color:#fff;">View</a></button>
                   {{--<button type="button" class="btn btn-danger submit" style="padding:0; ">Submit</button>
                    <button type="button" class="btn btn-danger edit" style="padding:0; ">Edit</button>--}}
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
        </form>
    </div>
</div>
</div>
</div>


@endsection