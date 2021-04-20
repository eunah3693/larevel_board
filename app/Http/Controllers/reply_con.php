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
            //dd($reply);
            $capsule = array('reply'=>$reply);
           
            return view('/all_detail', ['data' => $data ,'reply' => $reply]);
        }else{
            return redirect('/login')->with('msg','로그인해주세요');
        }

    }



    public function data_reply(Request $r)
    {
        $parent_id=$r->id;
        $u_reply=$r->u_reply;
       
        $update = DB::table('reply')->where('parent_id',$parent_id)->get();
        if($update->isEmpty()){
            //답변이 비었을경우 
            $reply = new reply;

            $reply->parent_id=$parent_id;
            $reply->reply=$u_reply;

            $insert=$reply->save();
            
            if($insert){
                return redirect('/all_detail')->with($insert)->with('message','제출되었습니다');
            }

        }else{
            //답변이 안비었을경우
            $update = DB::table('reply')->where('parent_id',$parent_id)->update(['reply'=> $u_reply]);

            if($update){
                return  redirect('/all_detail')->with('message','수정되었습니다');
            }
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
