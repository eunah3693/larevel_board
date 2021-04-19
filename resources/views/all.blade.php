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
                <td>{{ $key->op }}</td>
                <td class="u_reply">
                    <input type="text" id="{{$key->id}}" name="u_reply" class="form-control">
                </td>
                <td>
                    <button type="button" class="btn btn-danger submit" style="padding:0; ">Save</button>
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
<script>
    $(function(){
        $(".submit").click(function(e){
            //e.preventDefault();
            var u_reply=$(this).parent().siblings(".u_reply").find("input").val();
            var u_reply_id=$(this).parent().siblings(".u_reply").find("input").attr("id");
            //console.log(u_reply);
            $.ajax({
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                type: "POST", //요청 메소드 방식
                url: "/data_reply/"+u_reply_id,
                dataType: "json", //서버가 요청 URL을 통해서 응답하는 내용의 타입
                data: {u_reply:u_reply},
                success: function (result) {
                    //console.log(u_reply);
                },
                error: function (a, b, c) {
                    //console.log(a + b + c);
                },
            });
        })

    })

</script>

@endsection