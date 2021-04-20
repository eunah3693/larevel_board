@extends('master')
@section('content')
<div class="card-body">
@if(session()->get('message'))
<div class="alert alert-info">
   {{session()->get('message')}}
</div>
@endif
    <div class="table-responsive">
    <form action="" method="post">
    @csrf

    <table class="table table-bordered">
            <?php
               $s1=1;
                foreach($data as $key){
               ?>
            <tr>
                <th style="width:150px;">no.</th>
                <td>{{ $s1++ }} </td>
                <th style="width:150px;">name</th>
                <td>{{ $key->name }}</td>
                <th style="width:150px;">job</th>
                <td>{{ $key->job }}</td>
            </tr>
            <tr>
                <th>Opinion</th>
                <td colspan="5"><span style="display:block; width:150px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $key->op }}</span></td>
            </tr>
            <tr>
                <th>Reply</th>
                
                <td class="u_reply" id="{{$key->id}}" colspan="5" >
                    <span> @foreach($reply as $k) {{ $k->reply }}@endforeach </span>
                </td>
                
            </tr>
            
            <?php } ?>
        </table>
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
            var u_reply=$(this).parents("tr").siblings().find(".u_reply").find("textarea").val();
            var u_reply_id=$(this).parents("tr").siblings().find(".u_reply").attr("id");
            //console.log(u_reply);
            //console.log(u_reply_id);
            
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

            $(this).parents("tr").siblings().find(".u_reply").find("textarea").text(reply);
            location.reload();
        })
       

    })

</script>

@endsection