<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\reply;
use App\Models\Users;


class reply_con extends Controller
{
    public function all_data(Request $r)
    {
        if($r->session()->get('is_admin')=="1"){

            $data = DB::table('users')->get();
            //$data = DB::select('select * from users as u join reply as r on u.id = r.parent_id');
            //dd($data);
            $capsule = array('data'=>$data);

            $reply = DB::table('reply')->get();
            $capsule = array('reply'=>$reply);
           
            return view('/all', ['data' => $data ,'reply' => $reply]);
        }else{
            return redirect('/login')->with('msg','로그인해주세요');
        }

    }
    public function all_detail(Request $r)
    {
        if($r->session()->get('is_admin')=="1"){
            $parent_id=$r->id;
            $data = DB::table('users')->where('id',$parent_id)->get();
            //$data = DB::select('select * from users as u join reply as r on u.id = r.parent_id');
            //dd($data);
            $capsule = array('data'=>$data);

            $reply = DB::table('reply')->where('parent_id',$parent_id)->get();
            $capsule = array('reply'=>$reply);
           
            return view('/all', ['data' => $data ,'reply' => $reply]);
        }else{
            return redirect('/login')->with('msg','로그인해주세요');
        }

    }

    public function data_reply(Request $r)
    {
        
        $parent_id=$r->id;
        $u_reply=$r->u_reply;
        //dd($reply);
        $reply = new reply;

        $reply->parent_id=$parent_id;
        $reply->reply=$u_reply;

        $insert=$reply->save();
        
        if($insert){
            return redirect('/all')->with($insert);
        }
    }

    public function data_edit(Request $r)
    {
        $update_id=$r->uid;

        dd($update_id);
       $name=$r->uname;
       $job=$r->ujob;
       $op=$r->uop;
       
        $update = DB::table('users')->where('id',$update_id)->update(['name'=> $name, 'job'=> $job, 'op'=> $op]);

       if($update){
           return  redirect('show_data')->with('message','수정되었습니다');
       }
    }
    public function fetch(Request $r)
    {
        if($r->session()->get('id')!=""){
            $name=$r->session()->get('name');
            $data = DB::table('users')->where('name',$name)->get();
            //dd($data);
            $capsule = array('data'=>$data);
           
            return view('/show')->with($capsule);

        }else{
            return redirect('/login')->with('msg','로그인해주세요');
        }

    }

   

}
