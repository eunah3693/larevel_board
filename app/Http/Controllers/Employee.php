<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\emp_model;


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
       $name=$r->uname;
       $job=$r->ujob;
       $op=$r->uop;

       $users=new Emp_model;

       $users->name=$name;
       $users->job=$job;
       $users->op=$op;

       $insert=$users->save();

       if($insert){
           return redirect('/reg')->with('success','성공');
       }
    }

    public function fetch()
    {
        $fetch_data= DB::table('users')->get();

        $capsule = array('data'=>$fetch_data);
        return view('show')->with($capsule);
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
