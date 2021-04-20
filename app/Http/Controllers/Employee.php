<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\emp_model;
use App\Models\reply;


class Employee extends Controller
{
    public function home($value='')
    {
        return view('a');
    }

    public function xx()
    {
        return view('about');
    }

    public function registration()
    {
       return view('registration');
    }

    public function data_insert(Request $r)
    {
        if($r->session()->get('id')!=""){
        $id=$r->session()->get('id');
       $name=$r->session()->get('name');
       $job=$r->session()->get('job');
       $op=$r->uop;

       $users=new Emp_model;

       $users->name=$name;
       $users->job=$job;
       $users->op=$op;

       $insert=$users->save();

       if($insert){
           return redirect('/reg')->with('success','성공');
       }
        }else{

        }
    }

    public function fetch(Request $r)
    {
        if($r->session()->get('id')!=""){
            $name=$r->session()->get('name');
            $data = DB::table('users')->where('name',$name)->get();
            //dd($data);
            $capsule = array('data'=>$data);

            $reply = DB::table('reply')->get();
            $capsule = array('reply'=>$reply);
           
            return view('/show', ['data' => $data ,'reply' => $reply]);
        }else{
            return redirect('/login')->with('msg','로그인해주세요');
        }

    }
    public function fetch_detail(Request $r)
    {
        if($r->session()->get('id')!=""){
            $id=$r->id;
            $data = DB::table('users')->where('id',$id)->get();
            //dd($data);
            $capsule = array('data'=>$data);

            $reply = DB::table('reply')->where('parent_id',$id)->get();
            $capsule = array('reply'=>$reply);
           
            return view('/view_detail', ['data' => $data ,'reply' => $reply]);
        }else{
            return redirect('/login')->with('msg','로그인해주세요');
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

    public function remove(Request $r)
    {
       $delete_id=$r->id;
       $deleted=DB::table('users')->where('id',$delete_id)->delete();
       if($deleted){
        return  redirect('show_data')->with('message','삭제되었습니다');
    }
    }

    

}
