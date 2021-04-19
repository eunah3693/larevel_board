<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\reply;


class reply_con extends Controller
{
    

    public function data_reply(Request $r)
    {
        
        $parent_id=$r->id;
        $reply=$r->u_reply;
        //dd($reply);
        $reply=new reply;

        $reply->parent_id=$parent_id;
        $reply->reply=$reply;

        $insert=$reply->save();

        if($insert){
            return redirect('/all')->with('message','성공');
        }
        
       
    }
    public function edit_data(Request $r)
    {
        $edit_id=$r->id;

        $data = DB::table('users')->where('id',$edit_id)->get();
        $capsule = array('e_data'=>$data);
        return view('edit')->with($capsule);
    }

    public function update(Request $r)
    {
        $update_id=$r->uid;
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

   
    
    public function all_data(Request $r)
    {
        if($r->session()->get('is_admin')=="1"){
            $data = DB::table('users')->get();
            //dd($data);
            $capsule = array('data'=>$data);
           
            return view('/all')->with($capsule);

        }else{
            return redirect('/login')->with('msg','로그인해주세요');
        }

    }
}
