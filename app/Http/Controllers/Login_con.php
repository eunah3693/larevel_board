<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Login;

class Login_con extends Controller
{
    public function index()
    {
        return view('create_acc');
    }
    public function create(Request $r)
    {
        $name=$r->uname;
        $job=$r->ujob;
        $pass=$r->u_pass;

        $login= new Login;
        $login->name=$name;
        $login->job=$job;
        $login->pass=$pass;

        $created=$login->save();
        if($created){
            return redirect('/login')->with('msg','계정이 만들어졌습니다');
        }

    }
    public function login()
    {
        return view('login');
    }

    public function check_user(Request $r)
    {
        $name=$r->uname;
        $password=$r->u_pass;

        $session =  DB::table('login')->where('name',$name)->where('pass',$password)->first();
        if($session){
            $r->session()->put('id',$session->id);
            $r->session()->put('name',$session->name);
            //dd($session[0]->name);
            return redirect('/welcome');
        }else{
            return redirect('/login')->with('msg','로그인 실패하였습니다');
        }


    }

    public function protect(Request $r)
    {
        if($r->session()->get('id')=="")
        {
            return redirect('/login');
        }else{
            $name=$r->session()->get('name');
            $id=$r->session()->get('id');
            //dd($name);
            //dd($id);
            $capsule=array('name' => $name);
            
            return view('protect')->with($capsule);
        }
    }

    public function logout(Request $r)
    {
        $r->session()->forget('id');
        $r->session()->forget('name');

        return redirect('/home');
    }
}
