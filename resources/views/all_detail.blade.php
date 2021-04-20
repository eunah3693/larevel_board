@extends('master')
@section('content')
<div class="card-body">
@if(session()->get('message'))
<div class="alert alert-info">
   {{session()->get('message')}}
</div>
@endif
    <div class="table-responsive">
    <form action="/data_reply" method="post">
    @csrf
    @foreach($data as $key)
    <h1>{{ $key->name }}</h1>
    @endforeach
    {{--<table class="table table-bordered">
        <thead>
            <tr>
                <th>no.</th>
                <th>name</th>
                <th>job</th>
            </tr>
            <tr>
                <th>Opinion</th>
            </tr>
            <tr>
                <th>Reply</th>
            </tr>
            <tr>
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
                </tr>
                <tr>
                <td ><span style="display:block; width:150px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $key->op }}</span></td>
                </tr>
                <tr>
                <td class="u_reply" id="{{$key->id}}" >
                    @foreach($reply as $k)
                    @if($key->id==$k->parent_id)
                    <span style="display:block;  width:150px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $k->reply }}</span>
                    @endif
                    @endforeach
                </td>
                </tr>
                <tr>
                <td>
                    <button type="button" class="btn btn-info view" style="padding:0; ">View</button>
                   {{--<button type="button" class="btn btn-danger submit" style="padding:0; ">Submit</button>
                    <button type="button" class="btn btn-danger edit" style="padding:0; ">Edit</button>--}}
                </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>--}}
        </form>
    </div>
</div>
</div>
</div>
<script>
    $(function(){
        var reply;
        
        $(".submit").click(function(e){
            //e.preventDefault();
            var u_reply=$(this).parent().siblings(".u_reply").find("input").val();
            var u_reply_id=$(this).parent().siblings(".u_reply").find("input").attr("id");
            //console.log(u_reply);
            
           
           $.ajax({
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                type: "POST", //요청 메소드 방식
                url: "/data_reply/"+u_reply_id,
                data: {u_reply: JSON.stringify(u_reply)},
                datatype: 'json',
                success: function (data) {
                    reply = data;
                },
                error: function (a, b, c) {
                },
            });
            $(this).parent().siblings(".u_reply").find("input").text(reply);
        })
       
        // $(".edit").click(function(e){
        //     //e.preventDefault();
        //     var u_reply=$(this).parent().siblings(".u_reply").find("input").val();
        //     var u_reply_id=$(this).parent().siblings(".u_reply").find("input").attr("id");
        //     //console.log(u_reply);
        //     $.ajax({
        //         headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
        //         type: "POST", //요청 메소드 방식
        //         url: "/data_eidt/"+u_reply_id,
        //         data: {u_reply:u_reply},
        //         datatype: 'json',
        //         success: function (data) {
        //             reply = data;
        //         },
        //         error: function (a, b, c) {
        //         },
        //     });
        //     $(this).parent().siblings(".u_reply").find("input").text(reply);
        // })
    })

</script>

@endsection